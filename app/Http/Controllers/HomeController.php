<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;

class HomeController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository){
        $this->postRepository = $postRepository;
    }
    /**
     * Show the application Home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = $this->postRepository->getPosts(6);
        return view('home', [
            'posts' => $posts
        ]);
    }
}
