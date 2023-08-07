<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\User\Posts\StoreRequest;

class PostController extends Controller
{
    /*
    *Stores a post
    *
    *@param $request Instance of the StoreRequest class for validation
    *@return redirect to previous page
    *
    */
    public function store(StoreRequest $request){
        $data = $request->validated();
        Post::create($data);
        return redirect()->back();
    }

    /*
    *Show all posts
    *
    *@return all posts retrieved from db
    *
    */
    public function index(){
        $post = Post::all();
        return view ('view', ['post' => $post]);
    }

    /*
    *Edit post
    *
    *@param $post Injection of Post.php model
    *@return specific post from db
    *
    */
    public function edit(Post $post){
        return view('edit', ['post'=>$post]);
    }

     /*
    *Edit post
    *
    *@param $request Instance of the StoreRequest class for validation
    *@param $post Injection of Post.php model
    *@return to post.index
    *
    */
    public function update(Post $post, StoreRequest $request){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.index');
    }

    /*
    *Destroy a post
    *
    *@param $post Injection of Post.php model
    *@return to previous page
    *
    */
    public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }
}