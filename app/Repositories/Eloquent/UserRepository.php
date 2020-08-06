<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

    public function __construct(User $model){
        parent::__construct($model);
    }

    public function getUsers(){
        return $this->all();
    }

    public function getUserByID(int $id){
        return $this->find($id);
    }
    
    public function createUser(array $attr){
        return $this->create($attr);
    }

    public function updateUser(array $attr, int $id){
        return $this->update($attr, $id);
    }

    public function deleteUser(int $id){
        return $this->delete($id);
    }
}