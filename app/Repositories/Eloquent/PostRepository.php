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
        return $this->query()
                    ->orderBy('publication_date','desc')
                    ->paginate(6);
    }

    public function getPostByID(int $id){
        return $this->find($id);
    }

    public function getPostsByUser(int $userID, int $perPage){
        return $this->query()
                    ->where('user_id',$userID)
                    ->orderBy('publication_date','desc')
                    ->paginate($perPage);
    }

    public function getPostsByDates(string $start_date, string $end_date, int $userID, int $perPage){
        return $this->query()
                    ->where('user_id',$userID)
                    ->whereBetween('publication_date',[$start_date,$end_date])
                    ->orderBy('publication_date','desc')
                    ->paginate($perPage);
    }
    
    public function createPost(array $attr){
        return $this->create($attr);
    }

    public function updatePost(array $attr, int $id){
        return $this->update($attr, $id);
    }

    public function deletePost(int $id){
        return $this->delete($id);
    }
}