<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{
//todo make a method to return some posts, post objects should come from the post model class
//also need to make a twig template to show the posts
//an example is in app/controllers/UsersController

public function posts()
    {
        $postModel = new Post();
      //  $template = $this->twig->load('posts/posts.twig');
      $title = 'View Posts';
      include './assets/views/posts/savePost.php';
     
       // $postData = [
       //     'posts' => $postModel->getAllPosts(), 
      //  ];
      //  echo $template->render($postData);
    }


/*
public function posts()
    {
        $name = $_GET['name'];
        $postModel = new Post();
        header("Content-Type: application/json");
        $post = $postModel->getAllPosts($name);
        echo json_encode($users);
        exit();

    }
    */


    public function savePost() {

        

        $name = $_POST['name'] ? $_POST['name']: false;
        $des = $_POST['des'] ? $_POST['des'] : false;
        $errors = [];

        //validate and sanitize name
        if ($name) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code
            //convert double and single quotes
            //treat coe as html5
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            //validate text length
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'name is too short';
            }
        }
        else{
            $errors['requiredName'] = 'Name field was left blank.';

        }
        


        if ($des) {

            $des = htmlspecialchars($des, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($des)< 2) {
                $errors['describeShort'] ='description is too short';
            }

         }
         else{
            $errors['descriptionEmpty'] = 'Description field is left blank';
            }
          
           

            if (count($errors)) {
                http_response_code(400);
                echo json_encode($errors);
                exit();
            }



            $returnPost = [
                'name' => $name,
                'des' => $des,
                
            ];
            echo json_encode($returnPost);
            exit();
    
        }
    
        public function validatePost() {
            $title = 'View Posts';
            include './assets/views/posts/savePost.php';
            exit();
        }
  } 


    



