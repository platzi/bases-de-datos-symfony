<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Metadata;
use App\Entity\Product;
use App\Entity\Tag;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Producto
        $product = new Product();
        $product->setName('Producto de prueba');
        $product->setSummary('Resumen de prueba');
        
        $metadata = new Metadata();
        $metadata->setCode(rand(100, 200));
        $metadata->setContent('Contenido oficial del producto');

        $manager->persist($metadata);

        $product->setMetadata($metadata);
        
        $manager->persist($product);

        // Etiquetas
        $tag_1 = new Tag();
        $tag_1->setName('Etiqueta # 1');
        $manager->persist($tag_1);

        $tag_2 = new Tag();
        $tag_2->setName('Etiqueta # 2');
        $manager->persist($tag_2);

        $product->addTag($tag_1);
        $product->addTag($tag_2);

        // Comentarios
        $comment_1 = new Comment();
        $comment_1->setContent('Comentario # 1');
        $manager->persist($comment_1);

        $comment_2 = new Comment();
        $comment_2->setContent('Comentario # 2');
        $manager->persist($comment_2);

        $product->addComment($comment_1);
        $product->addComment($comment_2);

        // Guardar
        $manager->flush();
    }
}
