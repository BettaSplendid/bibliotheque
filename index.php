<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;

$router = new Router($_GET['url']);

$router->get("/", "App\Controller\AppController@index");

//Book
$router->get("/book", "App\Controller\BookController@index");
$router->get("/book_all", "App\Controller\BookController@show_all_books");
$router->get("/book_random", "App\Controller\BookController@add_random_book");

$router->get("/book_add", "App\Controller\BookController@show_add_book");
$router->post("/book_add", "App\Controller\BookController@add_book");

$router->get("/book_modify:id", "App\Controller\BookController@modify_book");
$router->post("/book_modify:id", "App\Controller\BookController@actually_modify_book");

$router->get("/book_borrow:id", "App\Controller\BookController@show_borrow_book");
$router->post("/book_borrow:id", "App\Controller\BookController@borrow_book");

$router->get("/book_delete:id", "App\Controller\BookController@delete_book");
$router->get("/book_return:id", "App\Controller\BookController@add_book");

//Review
$router->get("/review", "App\Controller\ReviewController@index");
$router->get("/review_add", "App\Controller\ReviewController@show_add_review");
$router->post("/review_add", "App\Controller\ReviewController@add_review");

$router->run();