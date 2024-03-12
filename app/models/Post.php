<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => 1,
                'title' => 'First Post',
                'content' => 'Content for the first post'
            ],
            
            [
                'id' => 2,
                'title' => 'Second Post',
                'content' => 'Content for the second post'
            ],

            [   'id'=> 3,
                'title' => 'Third Post',
                'content'=> 'Content for the third post'
            ], 
            // Will add more posts as go along
        ];
    }
}