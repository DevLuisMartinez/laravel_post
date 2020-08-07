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
        $posts = $this->postRepository->getPosts();
        return view('dashboard.post.index',[
            'posts' => $posts
        ]);
    }

    public function myPosts(){

        $perPage = 6;
        $posts = $this->postRepository->getPostsByUser(auth()->id(), $perPage);
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

    public function show(int $id){
        //
    }


    public function update(PostForm $request, int $id){
 
        $post = $this->postRepository->updatePost($request->all(),$id);
        Toastr::success('Post updated successfully :)','Success');
        return redirect()->action('Dashboard\PostController@index');
    }

    public function destroy(int $id){
        $post = $this->postRepository->deletePost($id);
        if ($post) {
            return response()->json([
                'ok'      => true,
                'message' => 'Post eliminado correctamente.',
            ]);

        } else {

            return response()->json([
                'ok'      => false,
                'message' => 'No se encontró el post a eliminar.',
            ]);

        }
    }
}
