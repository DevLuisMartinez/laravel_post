<?php

namespace App\Services\API;

use App\Services\ExternalPostInterface;
use App\Services\HttpClient\GuzzleClient;

class SquarePost implements ExternalPostInterface{

    private $client;
    public function __construct(GuzzleClient $client){

        $this->client = $client;
        $this->client->setUri('https://sq1-api-test.herokuapp.com/'); 
    }

    public function getPosts(){

        $this->client->setResource('posts');
        $res = $this->client->getData();
        return $res->data;
    }

}