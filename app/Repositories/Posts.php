<?php

    namespace App\Repositories;

    use App\Post;

    class Posts {

        public function all(){
            return Post::all();
        }

        public function find(){
            // find specific post

        }
    }