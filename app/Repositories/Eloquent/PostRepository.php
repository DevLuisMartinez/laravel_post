<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface{

    public function __construct(Post $model){
        parent::__construct($model);
    }

    public function getPosts(){
        return $this->all();
    }

    public function getPostByID(int $id){
        return $this->find($id);
    }
    
    public function createPost(array $attr){
        
        $attr['publication_date'] = '';
        $attr['user_id'] = '';
        return $this->create($attr);
    }

    public function updatePost(array $attr, int $id){
        return $this->update($attr, $id);
    }

    public function deletePost(int $id){
        return $this->delete($id);
    }
}