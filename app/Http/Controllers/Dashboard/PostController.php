<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepositoryInterface;
use App\Services\ExternalPostInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PostForm;
use Carbon\Carbon;
use Toastr;

class PostController extends Controller
{
    private $postRepository;
    private $postExternal;

    public function __construct(
        PostRepositoryInterface $postRepository, 
        ExternalPostInterface $postExternal
    ){

        $this->postRepository   = $postRepository;
        $this->postExternal     = $postExternal;
    }

    /**
     * Show Dahsboard Post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $perPage = 3;
        $posts = $this->postRepository->getPostsByUser(auth()->id(), $perPage);
        return view('dashboard.post.index',[
            'posts' => $posts
        ]);
    }

    public function search(Request $request){
        
        $perPage = 3;
        $posts = $this->postRepository
                        ->getPostsByDates(
                            Carbon::parse($request->start_date)->format('Y-m-d'),
                            Carbon::parse($request->end_date)->format('Y-m-d'), 
                            auth()->id(),
                            $perPage
                        );
        return view('dashboard.post.index',[
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('dashboard.post.form');
    }

    public function store(PostForm $request){

        $request->request->add(['publication_date' => null]);
        $request->request->add(['user_id' => null]);
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
