<?php

namespace App\Repositories;

interface PostRepositoryInterface{

    public function getPosts();
    public function getPostByID(int $id);
    public function getPostsByUser(int $userID, int $perPage);
    public function getPostsByDates(string $start_date, string $end_date, int $userID, int $perPage);
    public function createPost(array $attr);
    public function updatePost(array $attr,int $id);
    public function deletePost(int $id);
}