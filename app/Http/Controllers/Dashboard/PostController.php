<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository){

        $this->postRepository = $postRepository;
    }

    /**
     * Show Dahsboard Post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.post.index');
    }

    public function create(){
        return view('dashboard.post.form');
    }

    public function store(Request $request){

        $post = $this->postRepository->createPost($request->all());
        return view('dashboard.post.index');
    }
}
