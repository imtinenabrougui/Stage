<?php

namespace App\Controller;

use App\Entity\Ficheclient;
use App\Form\FicheclientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ficheclient')]
class FicheclientController extends AbstractController
{
    #[Route('/', name: 'app_ficheclient_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ficheclients = $entityManager
            ->getRepository(Ficheclient::class)
            ->findAll();

        return $this->render('ficheclient/index.html.twig', [
            'ficheclients' => $ficheclients,
        ]);
    }
    #[Route('/afficherback', name: 'app_ficheclient_back', methods: ['GET'])]
    public function back(EntityManagerInterface $entityManager): Response
    {
        $ficheclients = $entityManager
            ->getRepository(Ficheclient::class)
            ->findAll();

        return $this->render('ficheclient/afficherback.html.twig', [
            'ficheclients' => $ficheclients,
        ]);
    }
    #[Route('/new', name: 'app_ficheclient_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ficheclient = new Ficheclient();
        $form = $this->createForm(FicheclientType::class, $ficheclient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ficheclient);
            $entityManager->flush();

            return $this->redirectToRoute('app_ficheclient_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ficheclient/new.html.twig', [
            'ficheclient' => $ficheclient,
            'form' => $form,
        ]);
    }

    #[Route('/{idfc}', name: 'app_ficheclient_show', methods: ['GET'])]
    public function show(int $idfc, EntityManagerInterface $entityManager): Response
    {
        $ficheclient = $entityManager
            ->getRepository(Ficheclient::class)
            ->find($idfc);
    
        if (!$ficheclient) {
            throw $this->createNotFoundException('ficheclient not found');
        }
    
        return $this->render('ficheclient/show.html.twig', [
            'ficheclient' => $ficheclient,
        ]);
    }
    #[Route('/{idfc}/edit', name: 'app_ficheclient_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $idfc, EntityManagerInterface $entityManager): Response
    {
        $ficheclient = $entityManager
            ->getRepository(Ficheclient::class)
            ->find($idfc);
    
        if (!$ficheclient) {
            throw $this->createNotFoundException('ficheclient not found');
        }
    
        $form = $this->createForm(FicheclientType::class, $ficheclient);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            return $this->redirectToRoute('app_ficheclient_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('ficheclient/edit.html.twig', [
            'ficheclient' => $ficheclient,
            'form' => $form,
        ]);
    }
    

    #[Route('/{idfc}', name: 'app_ficheclient_delete', methods: ['POST'])]
    public function delete(Request $request, int $idfc, EntityManagerInterface $entityManager): Response
    {
        $ficheclient = $entityManager
            ->getRepository(Ficheclient::class)
            ->find($idfc);
    
        if (!$ficheclient) {
            throw $this->createNotFoundException('ficheclient not found');
        }
    
        if ($this->isCsrfTokenValid('delete'.$ficheclient->getIdfc(), $request->request->get('_token'))) {
            $entityManager->remove($ficheclient);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_ficheclient_index', [], Response::HTTP_SEE_OTHER);
    }
}
