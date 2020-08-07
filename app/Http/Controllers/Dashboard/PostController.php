<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PostForm;
use Toastr;

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
        $posts = $this->postRepository->paginatePosts(6);
        return view('dashboard.post.index',[
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('dashboard.post.form');
    }

    public function store(PostForm $request){

        $post = $this->postRepository->createPost($request->all());
        Toastr::success('Post added successfully :)','Success');
        return redirect()->action('Dashboard\PostController@index');
    }

    public function edit(int $id){
        $post = $this->postRepository->getPostByID($id);
        return view('dashboard.post.form',[
            'post' => $post
        ]);
    }

    public function update(Request $request, int $id){
 
        $post = $this->postRepository->updatePost($request->all(),$id);
        return redirect()->action('Dashboard\PostController@index');
    }

    public function destroy(int $id){
        $post = $this->postRepository->deletePost($id);
        return redirect()->action('Dashboard\PostController@index');
    }
}
