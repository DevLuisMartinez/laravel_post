<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface{

    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     **/
    public function model(){
        return Post::class;
    }

    public function getPosts(){
        return $this->all();
    }

    public function getPostByID(int $id){
        return $this->find($id);
    }

    public function paginatePosts(int $perPage, array $col = ['*']){
        return $this->paginate($perPage,$col);
    }
    
    public function createPost(array $attr){
        
        $attr['publication_date'] = null;
        $attr['user_id'] = null;
        return $this->create($attr);
    }

    public function updatePost(array $attr, int $id){
        return $this->update($attr, $id);
    }

    public function deletePost(int $id){
        return $this->delete($id);
    }
}