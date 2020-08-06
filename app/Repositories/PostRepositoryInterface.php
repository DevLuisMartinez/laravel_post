<?php

namespace App\Repositories;

interface PostRepositoryInterface{

    public function getPosts();
    public function getPostByID(int $id);
    public function createPost(array $attr);
    public function updatePost(array $attr,int $id);
    public function deletePost(int $id);
}