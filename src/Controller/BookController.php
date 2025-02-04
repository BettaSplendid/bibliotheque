<?php

namespace App\Controller;

use App\Entity\Book;
use Router\Router;

use Doctrine\ORM\EntityRepository;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;



final class BookController
{

    public function index(): void
    {
        print("Hello Book");
    }

    public function error404(): void
    {
        Router::redirect("404");
    }

    public function show_all_books()
    {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        $books = $repo->findAll();
        foreach ($books as $key => $value) {
            echo ('<br><br>');
            print($value->getAssociated_review());
        }
    }

    public function show_add_book()
    {
        include('./src/Views/AddBook.php');
    }

    public function add_book()
    {
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        try {
            $BookBook = htmlentities(strip_tags($_POST['ISBN']));
            $Result = $repo->find($BookBook);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./src/Views/AddBook.php')", true, 303);
        }

        if (!($Result == Null)) {
            echo ("There's already a book with this ISBN!");
            header("Refresh:5; url=('./src/Views/AddBook.php')", true, 303);
        }

        $Book_To_Add = new Book($_POST['ISBN'], $_POST['title'], $_POST['resume'], $_POST['author'], $_POST['editor'], $_POST['nb_available']);
        $entityManager->persist($Book_To_Add);
        $entityManager->flush();
    }

    public function modify_book($id_book)
    {
        $id_book = preg_replace('/[^A-Za-z0-9\-]/', '', $id_book);
        $id_book = (int) $id_book;

        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));
        try {
            $Result = $repo->find($id_book);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./src/Views/ModifyBook.php')", true, 303);
        }
        include('./src/Views/ModifyBook.php');
    }

    public function actually_modify_book($id_book)
    {
        if (
            empty(htmlentities(strip_tags($_POST['title']))) ||
            empty(htmlentities(strip_tags($_POST['resume']))) ||
            empty(htmlentities(strip_tags($_POST['author']))) ||
            empty(htmlentities(strip_tags($_POST['editor']))) ||
            empty(htmlentities(strip_tags($_POST['total_borrow_number'])))
        ) {
            echo ("Missing parameter");
            throw new Exception;
        }
        $entityManager = Em::getEntityManager();
        $repo = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));


        $id_book = preg_replace('/[^A-Za-z0-9\-]/', '', $id_book);
        $id_book = (int) $id_book;

        $book = $repo->find($id_book);


        $book->setTitle($_POST['title']);
        $book->setResume($_POST['resume']);
        $book->setAuthor($_POST['author']);
        $book->setEditor($_POST['editor']);
        $book->setTotal_borrow_number($_POST['total_borrow_number']);


        $entityManager->persist($book);
        $entityManager->flush();
    }

    public function delete_book($id_book)
    {
        $id_book = preg_replace('/[^A-Za-z0-9\-]/', '', $id_book);
        $id_book = (int) $id_book;
        $entityManager = Em::getEntityManager();
        $repos = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        try {
            $book_to_delete = $repos->find($id_book);
            $entityManager->remove($book_to_delete);
            $entityManager->flush();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./index.php')", true, 303);
        }
    }

    public function show_borrow_book()
    {
        include('./src/Views/BorrowBook.php');
    }

    public function borrow_book()
    {
        $BookBook = (int) htmlentities(strip_tags($_POST['ISBN']));

        $entityManager = Em::getEntityManager();
        $repos = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        try {
            $book_to_delete = $repos->find($BookBook);

            $placeholder = $book_to_delete->getNb_available();
            $placeholder--;
            $book_to_delete->setNb_available($placeholder);
            $entityManager->flush();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./src/Views/BorrowBook.php')", true, 303);
        }
    }

    public function show_return_book()
    {
        include('./src/Views/BorrowBook.php');
    }

    public function return_book()
    {
        $BookBook = (int) htmlentities(strip_tags($_POST['ISBN']));

        $entityManager = Em::getEntityManager();
        $repos = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Book"));

        try {
            $book_to_delete = $repos->find($BookBook);

            $placeholder = $book_to_delete->getNb_available();
            $placeholder++;
            $book_to_delete->setNb_available($placeholder);
            $entityManager->flush();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header("Refresh:5; url=('./src/Views/BorrowBook.php')", true, 303);
        }
    }
}
