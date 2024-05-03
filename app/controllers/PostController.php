<?php

namespace app\controllers;
//namespace app\models;
use app\core\Controller;
 use app\models\Post;



class PostController extends Controller
{
//todo make a method to return some posts, post objects should come from the post model class
//also need to make a twig template to show the posts
//an example is in app/controllers/UsersController

public function seePosts()
{
    $postModel = new Post();
    
    $template = $this->twig->load('posts/posts.twig');
    $postData = [
        'posts' => $postModel->getAllPosts(),
    ];
    echo $template->render($postData);
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
    $inputData = [
        'name' => $_POST['name'] ?? '',
        'description' => $_POST['description'] ?? '',
    ];

    // Validate the input data
    if (empty($inputData['name'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Name is required.']);
        exit();
    }
    if (empty($inputData['description'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Description is required.']);
        exit();
    }

    // Escape HTML characters
    $inputData['name'] = htmlspecialchars($inputData['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $inputData['description'] = htmlspecialchars($inputData['description'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

 

    http_response_code(200);
    echo json_encode(['message' => 'Post saved successfully.']);
    exit();
}




        public function viewPost() {
            $title = 'View Posts';

            include '../public/assets/views/posts/savePost.php';
            exit();
        }
        


  } 

  

    



