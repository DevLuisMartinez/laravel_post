<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface{

    /**
     * @var Model
     */
    protected $model;


    public function __construct(Model $model){

        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }

    public function find(int $id){
        return $this->model->findOrFail($id);
    }

    public function query(){
        return $this->model->newQuery();
    }

    public function create(array $attr){
        return $this->model->create($attr);
    }

    public function update(array $attr, int $id){
        $model = $this->find($id);
        return $model->fill($attr)->save();
    }

    public function delete(int $id){
        
        $model = $this->find($id);
        return $model->delete();
    }   
}