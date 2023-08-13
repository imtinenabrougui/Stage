<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/back', name: 'app_article_index', methods: ['GET'])]
    public function back(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager
            ->getRepository(Article::class)
            ->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/', name: 'app_article_front', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager
            ->getRepository(Article::class)
            ->findAll();

        return $this->render('article/afficherfront.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/new', name: 'app_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }


    
    #[Route('/{ida}', name: 'app_article_show', methods: ['GET'])]
    public function show(int $ida, EntityManagerInterface $entityManager): Response
    {
        $article = $entityManager
            ->getRepository(Article::class)
            ->find($ida);
    
        if (!$article) {
            throw $this->createNotFoundException('Article not found');
        }
    
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
    

    #[Route('/{ida}/edit', name: 'app_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $ida, EntityManagerInterface $entityManager): Response
    {
        $article = $entityManager
            ->getRepository(Article::class)
            ->find($ida);
    
        if (!$article) {
            throw $this->createNotFoundException('Article not found');
        }
    
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }
    

    #[Route('/{ida}', name: 'app_article_delete', methods: ['POST'])]
    public function delete(Request $request, int $ida, EntityManagerInterface $entityManager): Response
    {
        $article = $entityManager
            ->getRepository(Article::class)
            ->find($ida);
    
        if (!$article) {
            throw $this->createNotFoundException('Article not found');
        }
    
        if ($this->isCsrfTokenValid('delete'.$article->getIda(), $request->request->get('_token'))) {
            $entityManager->remove($article);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
