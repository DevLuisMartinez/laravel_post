<?php

namespace App\Services\HttpClient;

use GuzzleHttp\Client as Guzzle;

class GuzzleClient{
    
    private $client;
    private $base_uri;
    private $fullUri;
    private $headers;
    private $resource;

    public function __construct(){

        $this->client = new Guzzle([
            'verify' => false
        ]);
    }

    public function setUri($uri){
        $this->base_uri = $uri;
    }

    public function setResource($resource){
        $this->resource = $resource;
    }

    private function fullUri(){
        return $this->base_uri.$this->resource;
    }

    public function getData(){
        
        $res = $this->client->get($this->fullUri(), $this->headers);
        return $this->getBody($res);
    }

    public function getBody($res){

        $data = $res->getBody();
        return json_decode($data);
    }
}