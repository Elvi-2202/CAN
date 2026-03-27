<?php

namespace App\Controller\Api;

use App\Entity\Nation;
use App\Entity\Players;
use App\Entity\Teams;
use App\Entity\TeamManagers;
use App\Entity\TeamTermsAcceptance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
    #[Route('/api/teams/register', name: 'api_team_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $em): JsonResponse
    {
        // return $this->json([
        //     'message' => 'Route OK'
        // ], 200);

        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return $this->json([
                'message' => 'JSON invalide'
            ], 400);
        }

        $errors = [];

        if (empty($data['nation_id'])) {
            $errors['nation_id'] = 'La nation est obligatoire.';
        }

        if (empty($data['manager']) || !is_array($data['manager'])) {
            $errors['manager'] = 'Le manager est obligatoire.';
        } else {
            $manager = $data['manager'];

            if (empty($manager['firstName'])) {
                $errors['manager.firstName'] = 'Le prénom du manager est obligatoire.';
            }

            if (empty($manager['lastName'])) {
                $errors['manager.lastName'] = 'Le nom du manager est obligatoire.';
            }

            if (empty($manager['email'])) {
                $errors['manager.email'] = 'L’email du manager est obligatoire.';
            }

            if (empty($manager['phone'])) {
                $errors['manager.phone'] = 'Le téléphone du manager est obligatoire.';
            }
        }

        if (empty($data['players']) || !is_array($data['players'])) {
            $errors['players'] = 'Les joueurs sont obligatoires.';
        } elseif (count($data['players']) < 12) {
            $errors['players'] = '12 joueurs minimum sont obligatoires.';
        } else {
            foreach ($data['players'] as $index => $player) {
                if (empty($player['firstName'])) {
                    $errors["players.$index.firstName"] = 'Le prénom est obligatoire.';
                }

                if (empty($player['lastName'])) {
                    $errors["players.$index.lastName"] = 'Le nom est obligatoire.';
                }

                if (!isset($player['age']) || $player['age'] === '' || (int) $player['age'] <= 0) {
                    $errors["players.$index.age"] = 'L’âge est obligatoire.';
                }

                if (
                    !isset($player['jerseyNumber']) ||
                    $player['jerseyNumber'] === '' ||
                    (int) $player['jerseyNumber'] <= 0
                ) {
                    $errors["players.$index.jerseyNumber"] = 'Le numéro de maillot est obligatoire.';
                }
            }
        }

        if (empty($data['consent']) || !is_array($data['consent'])) {
            $errors['consent'] = 'Le consentement est obligatoire.';
        } elseif (($data['consent']['accepted'] ?? false) !== true) {
            $errors['consent.accepted'] = 'Le règlement doit être accepté.';
        }

        if (!empty($errors)) {
            return $this->json([
                'message' => 'Validation failed',
                'errors' => $errors
            ], 422);
        }

        $nation = $em->getRepository(Nation::class)->find($data['nation_id']);

        if (!$nation) {
            return $this->json([
                'message' => 'Nation introuvable'
            ], 404);
        }

        try {
            $now = new \DateTimeImmutable();

            $team = new Teams();
            $team->setNation($nation);
            $team->setStatus('PENDING_PAYMENT');
            $team->setTotalAmount(24000);
            $team->setCurrency('EUR');
            $team->setCreatedAt($now);
            $team->setUpdatedAt($now);

            $managerData = $data['manager'];

            $teamManager = new TeamManagers();
            $teamManager->setFirstName($managerData['firstName']);
            $teamManager->setLastName($managerData['lastName']);
            $teamManager->setEmail($managerData['email']);
            $teamManager->setPhone($managerData['phone']);
            $teamManager->setCity($managerData['city'] ?? null);

            $team->setTeamManagers($teamManager);

            $consentData = $data['consent'];

            $termsAcceptance = new TeamTermsAcceptance();
            $termsAcceptance->setAccepted(true);
            $termsAcceptance->setAcceptedAt($now);
            $termsAcceptance->setTermsVersion($consentData['termsVersion'] ?? 'v1');
            $termsAcceptance->setIpAdress($request->getClientIp());
            $termsAcceptance->setUserAgent($request->headers->get('User-Agent'));

            $team->setTeamTermsAcceptance($termsAcceptance);

            foreach ($data['players'] as $playerData) {
                $player = new Players();
                $player->setFirstName($playerData['firstName']);
                $player->setLastName($playerData['lastName']);
                $player->setAge((int) $playerData['age']);
                $player->setJerseyNumber((int) $playerData['jerseyNumber']);

                $team->addPlayer($player);
            }

            $em->persist($team);
            $em->flush();

            return $this->json([
                'message' => 'Équipe enregistrée avec succès',
                'team_id' => $team->getId(),
                'status' => $team->getStatus()
            ], 201);
        } catch (\Throwable $e) {
            return $this->json([
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}