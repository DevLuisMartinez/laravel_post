<?php

namespace App\Repositories;

interface UserRepositoryInterface{

    public function getUsers();
    public function getUserByID(int $id);
    public function createUser(array $attr);
    public function updateUser(array $attr,int $id);
    public function deleteUser(int $id);
}