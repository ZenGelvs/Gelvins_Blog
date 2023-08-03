<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\User\Posts\StoreRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function store (StoreRequest $request){
        $data = $request -> validated();
        Post::create($data);
        return redirect() ->back();
    }
    
    public function index(){
        $post = Post::all();
        return view ('view', ['post' => $post]);
    }

    public function edit(Post $post){
        return view('edit', ['post'=>$post]);
    }

    public function update(Post $post, StoreRequest $request){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }
}