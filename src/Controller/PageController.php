<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\Product;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(EntityManagerInterface $entityManager): Response
    {
        return $this->render('page/home.html.twig', [
            'products' => $entityManager->getRepository(Product::class)->findLatest()
        ]);
    }

    #[Route('/etiqueta/{id}', name: 'app_tag')]
    public function tag(Tag $tag, EntityManagerInterface $entityManager): Response
    {
        return $this->render('page/tag.html.twig', [
            'tag' => $tag,
            'products' => $entityManager->getRepository(Product::class)->findByTag($tag)
        ]);
    }

    #[Route('/producto/{id}', name: 'app_product')]
    public function product(Product $product): Response
    {
        return $this->render('page/product.html.twig', [
            'product' => $product
        ]);
    }

    #[Route('/comentarios', name: 'app_comments')]
    public function comments(EntityManagerInterface $entityManager): Response
    {
        return $this->render('page/comments.html.twig', [
            'comments' => $entityManager->getRepository(Comment::class)->findAllComments()
        ]);
    }
}
