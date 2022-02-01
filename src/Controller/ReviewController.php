<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Review;
use Router\Router;

use Doctrine\ORM\EntityRepository;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\Mapping\ClassMetadata;



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
        $book_repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));
        $review_repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Review"));

        $book_id = $_POST['ISBN'];
        $note = $_POST['note'];
        $text_part = $_POST['text_part'];

        try {
            $Result = $book_repo->find($book_id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./src/Views/AddReview.php')", true, 303);
        }

        if (!$Result) {
            echo ("null variable");
            header("Refresh:5; url=('./src/Views/AddReview.php')", true, 303);
        }

        $review_to_post = new Review($Result, $note, "test");
        $entityManager->persist($review_to_post);
        $entityManager->flush();
    }
}
