<?php

namespace App\Repositories;

interface EloquentRepositoryInterface{

    public function all();
    public function find(int $id);
    public function create(array $attr);
    public function update(array $attr,int $id);
    public function delete(int $id);
}