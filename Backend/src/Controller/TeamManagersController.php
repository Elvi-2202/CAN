<?php

namespace App\Controller;

use App\Entity\TeamManagers;
use App\Form\TeamManagersType;
use App\Repository\TeamManagersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/team/managers')]
final class TeamManagersController extends AbstractController
{
    #[Route(name: 'app_team_managers_index', methods: ['GET'])]
    public function index(TeamManagersRepository $teamManagersRepository): Response
    {
        return $this->render('team_managers/index.html.twig', [
            'team_managers' => $teamManagersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_team_managers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $teamManager = new TeamManagers();
        $form = $this->createForm(TeamManagersType::class, $teamManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($teamManager);
            $entityManager->flush();

            return $this->redirectToRoute('app_team_managers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_managers/new.html.twig', [
            'team_manager' => $teamManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_managers_show', methods: ['GET'])]
    public function show(TeamManagers $teamManager): Response
    {
        return $this->render('team_managers/show.html.twig', [
            'team_manager' => $teamManager,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_team_managers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TeamManagers $teamManager, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TeamManagersType::class, $teamManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_team_managers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('team_managers/edit.html.twig', [
            'team_manager' => $teamManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_team_managers_delete', methods: ['POST'])]
    public function delete(Request $request, TeamManagers $teamManager, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teamManager->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($teamManager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_team_managers_index', [], Response::HTTP_SEE_OTHER);
    }
}
