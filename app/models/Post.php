<?php

namespace app\models;

//use app\core\Database;
class Post
{

   // use Database;

    public function getAllPosts() {
        return [
            [
                'id' => 1,
                'name' => 'First Post',
                'description' => 'Content for the first post'
            ],
            
            [
                'id' => 2,
                'name' => 'Second Post',
                'description' => 'Content for the second post'
            ],

            [   'id'=> 3,
                'name' => 'Third Post',
                'description'=> 'Content for the third post'
            ], 
            // Will add more posts as go along
        ];
    }

    
    public function saveThePost() {
      
            
    
    }
    
}