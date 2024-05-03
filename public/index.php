<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
//require_once "../app/core/Database.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;
use app\models\Post;



// $env = parse_ini_file('../homework7.env');
// $url = $_SERVER["REQUEST_URI"];

$uri = strtok($_SERVER["REQUEST_URI"], '?');



$mainController = new MainController();
$postController = new PostController();

// if($uri=== '/posts')
  
    switch ($uri) {
        case '/':
            $mainController->homepage();
            break;

            case '/posts':
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                   
                    $postController->savePost();
                } else {
                   $postController->viewPost(); 
                 
                }
                break;

             case '/view':
               $postController->seePosts();   
        default:
            $mainController->notFound();
            break;
            
    }
    
/*
    if ($uri === '/posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
      //  $postController = new PostController();
      
        $postController->savePost();
    }
    */
    
   

//todo add a switch statement router to route based on the url
//if it is "/posts" return an array of posts via the post controller
//if it is "/" return the homepage view from the main controller
//if it is something else return a 404 view from the main controller

