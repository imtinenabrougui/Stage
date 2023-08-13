<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Notifier\Recipient\Recipient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException; 



#[Route('/demande')]
class DemandeController extends AbstractController
{
    #[Route('/', name: 'app_demande_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $demandes = $entityManager
            ->getRepository(Demande::class)
            ->findAll();

        return $this->render('demande/index.html.twig', [
            'demandes' => $demandes,
        ]);
    }
    #[Route('/afficherback', name: 'app_demande_back', methods: ['GET'])]
    public function back(EntityManagerInterface $entityManager): Response
    {
        $demandes = $entityManager
            ->getRepository(Demande::class)
            ->findAll();

        return $this->render('demande/afficherback.html.twig', [
            'demandes' => $demandes,
        ]);
    }
    #[Route('/new', name: 'app_demande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devis = $form->get('devis')->getData();

    if ($devis) {
        $originalFilename = pathinfo($devis->getClientOriginalName(), PATHINFO_FILENAME);
   
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'.'.$devis->guessExtension();

        try {
            $devis->move(
                $this->getParameter('brochures_directory'),
                $newFilename
            );
        } catch (FileException $e) {
         
        }

        $demande->setDevis($newFilename);
    }
    $fichePaie = $form->get('fichePaie')->getData();

    if ($fichePaie) {
        $originalFilename = pathinfo($fichePaie->getClientOriginalName(), PATHINFO_FILENAME);
   
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'.'.$fichePaie->guessExtension();

        try {
            $fichePaie->move(
                $this->getParameter('brochures_directory'),
                $newFilename
            );
        } catch (FileException $e) {
         
        }

        $demande->setFichePaie($newFilename);
    }
    $copieCin = $form->get('copieCin')->getData();

    if ($copieCin) {
        $originalFilename = pathinfo($copieCin->getClientOriginalName(), PATHINFO_FILENAME);
   
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'.'.$copieCin->guessExtension();

        try {
            $copieCin->move(
                $this->getParameter('brochures_directory'),
                $newFilename
            );
        } catch (FileException $e) {
         
        }

        $demande->setCopieCin($newFilename);
    }
    $attestationSalaire = $form->get('attestationSalaire')->getData();

            if ($attestationSalaire) {
                $originalFilename = pathinfo($attestationSalaire->getClientOriginalName(), PATHINFO_FILENAME);
           
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$attestationSalaire->guessExtension();
        
                try {
                    $attestationSalaire->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                 
                }
        
                $demande->setAttestationSalaire($newFilename);
            }
            $entityManager->persist($demande);
            $entityManager->flush();

            return $this->redirectToRoute('app_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demande_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $demande = $entityManager
            ->getRepository(Demande::class)
            ->find($id);
    
        if (!$demande) {
            throw $this->createNotFoundException('Demande not found');
        }
    
        return $this->render('demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }
    #[Route('/{id}/edit', name: 'app_demande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $id, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $demande = $entityManager
            ->getRepository(Demande::class)
            ->find($id);
    
        if (!$demande) {
            throw $this->createNotFoundException('Demande not found');
        }
    
        $form = $this->createForm(demandeType::class, $demande);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $devis = $form->get('devis')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($devis) {
                $originalFilename = pathinfo($devis->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$devis->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $devis->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $demande->setDevis($newFilename);
            }
            ////////////////////////////////////////////////////////////////////////////////
            $fichePaie = $form->get('fichePaie')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($fichePaie) {
                $originalFilename = pathinfo($fichePaie->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$fichePaie->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $fichePaie->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $demande->setFichePaie($newFilename);
            }
            $copieCin = $form->get('copieCin')->getData();

            if ($copieCin) {
                $originalFilename = pathinfo($copieCin->getClientOriginalName(), PATHINFO_FILENAME);
           
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$copieCin->guessExtension();
        
                try {
                    $copieCin->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                 
                }
        
                $demande->setCopieCin($newFilename);
            }
            $attestationSalaire = $form->get('attestationSalaire')->getData();

            if ($attestationSalaire) {
                $originalFilename = pathinfo($attestationSalaire->getClientOriginalName(), PATHINFO_FILENAME);
           
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'.'.$attestationSalaire->guessExtension();
        
                try {
                    $attestationSalaire->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                 
                }
        
                $demande->setAttestationSalaire($newFilename);
            }
            $entityManager->flush();
    
            return $this->redirectToRoute('app_demande_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }
    

    #[Route('/{id}', name: 'app_demande_delete', methods: ['POST'])]
    public function delete(Request $request, int $id, EntityManagerInterface $entityManager): Response
    {
        $demande = $entityManager
            ->getRepository(demande::class)
            ->find($id);
    
        if (!$demande) {
            throw $this->createNotFoundException('demande not found');
        }
    
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($demande);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_demande_index', [], Response::HTTP_SEE_OTHER);
    }
}
