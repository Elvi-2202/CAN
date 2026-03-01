<?php

namespace App\Controller;

use App\Entity\TeamTermsAcceptance;
use App\Form\TeamTermsAcceptanceType;
use App\Repository\TeamTermsAcceptanceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/team/terms/acceptance')]
final class TeamTermsAcceptanceController extends AbstractController
{
    #[Route(name: 'app_team_terms_acceptance_index', methods: ['GET'])]
    public function index(TeamTermsAcceptanceRepository $teamTermsAcceptanceRepository): Response
    {
        return $this->render('team_terms_acceptance/index.html.twig', [
            'team_terms_acceptances' => $teamTermsAcceptanceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_team_terms_acceptance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $teamTermsAcceptance = new TeamTermsAcceptance();
        $form = $this->createForm(TeamTermsAcceptanceType::class, $teamTermsAcceptance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($teamTermsAcceptance);
            $entityManager->flush();

            return $this->redirectToRoute('app_team_terms_acceptance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_terms_acceptance/new.html.twig', [
            'team_terms_acceptance' => $teamTermsAcceptance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_terms_acceptance_show', methods: ['GET'])]
    public function show(TeamTermsAcceptance $teamTermsAcceptance): Response
    {
        return $this->render('team_terms_acceptance/show.html.twig', [
            'team_terms_acceptance' => $teamTermsAcceptance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_team_terms_acceptance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TeamTermsAcceptance $teamTermsAcceptance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TeamTermsAcceptanceType::class, $teamTermsAcceptance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_team_terms_acceptance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_terms_acceptance/edit.html.twig', [
            'team_terms_acceptance' => $teamTermsAcceptance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_terms_acceptance_delete', methods: ['POST'])]
    public function delete(Request $request, TeamTermsAcceptance $teamTermsAcceptance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teamTermsAcceptance->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($teamTermsAcceptance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_team_terms_acceptance_index', [], Response::HTTP_SEE_OTHER);
    }
}
