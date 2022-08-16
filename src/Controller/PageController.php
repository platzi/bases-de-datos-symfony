<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\ProductRepository;
use App\Repository\TagRepository;

use App\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(Request $request, TagRepository $tagRepository, ProductRepository $productRepository): Response
    {
        $tag = null;

        if ($request->get('tag')) {
            $tag = $tagRepository->findOneBy(['name' => $request->get('tag')]);
        }

        return $this->render('page/home.html.twig', [
            'products' => $productRepository->findLatest($tag)
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
    public function comments(CommentRepository $commentRepository): Response
    {
        return $this->render('page/comments.html.twig', [
            'comments' => $commentRepository->findAllComments()
        ]);
    }
}
