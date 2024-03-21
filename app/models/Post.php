<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => 1,
                'name' => 'First Post',
                'des' => 'Content for the first post'
            ],
            
            [
                'id' => 2,
                'name' => 'Second Post',
                'des' => 'Content for the second post'
            ],

            [   'id'=> 3,
                'name' => 'Third Post',
                'des'=> 'Content for the third post'
            ], 
            // Will add more posts as go along
        ];
    }

    public function savePost() {

    }
}