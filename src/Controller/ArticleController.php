<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article_type', name: 'article_type')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crée une instance de l'entité Article
        $article = new Article();

        // Crée le formulaire en utilisant ArticleType
        $form = $this->createForm(ArticleType::class, $article);

        // Traite la soumission du formulaire
        $form->handleRequest($request);

        // Vérifie si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            // Redirige vers une autre page (par exemple, la liste des articles)
            // return $this->redirectToRoute('article/article_list.index');
            return $this->redirectToRoute('article_list');
        }

        return $this->render('article/article_type.html.twig', [
                    'controller_name' => 'ArticleController',
                    'form' => $form->createView(),
                ]);
    }

    #[Route('/article_list', name: 'article_list')]
    public function listArticles(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        return $this->render('article/article_list.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/article_delete/{id}', name: 'article_delete')]
    public function deleteArticle(Article $article, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('article_list');
    }
}