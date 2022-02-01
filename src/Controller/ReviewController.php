<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Review;
use Router\Router;

use Doctrine\ORM\EntityRepository;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\Mapping\ClassMetadata;

use Faker\Factory;



final class ReviewController
{

    public function index(): void
    {
        print("Hello Book");
    }

    public function error404(): void
    {
        Router::redirect("404");
    }

    public function show_add_review()
    {
        include('./src/Views/AddReview.php');
    }

    public function add_review()
    {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        
        $book_id = $_POST['ISBN'];
        $note = $_POST['note'];
        $text_part = $_POST['text_part'];
        

        try {
            $Result = $repo->find($book_id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            die();
        }


        $review_to_post = new Review($Result, $note, $text_part);
        $entityManager->persist($review_to_post);
        $entityManager->flush();
    }
}
