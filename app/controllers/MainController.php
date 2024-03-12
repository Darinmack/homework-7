<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;
use app\models\User;

class MainController extends Controller
{

    public function homepage()
    {
        $template = $this->twig->load('main/homepage.twig');
        $homepageData = [
            'title' => 'Homepage Title',
        ];

        echo $template->render($homepageData);
    }

    public function notFound() {
        //todo create a 404 twig template in app/public/assets/views
        //an example is in app/controllers/UsersController
        //and return it from this method

        // Load the 404 Twig template
        $template = $this->twig->load('errors/404.twig');
        
        // Render and return the 404 page
        echo $template->render();
    }

}