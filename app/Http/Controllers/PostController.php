<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\User\Posts\StoreRequest;

class PostController extends Controller
{

    //Create post and return to addpost view
    public function store(StoreRequest $request){
        
        $data = $request->validated();
        Post::create($data);
        return redirect('/Posts./view');
    }

    //show index view and contents of posts 
    public function index(){
        $post = Post::all();
        return view ('view', ['post' => $post]);
    }

    //return to addpost view
    public function return(){
        return view ('posts');
    }

    //edit function that retries data from db
    public function edit(Post $post){
        return view('edit', ['post'=>$post]);
    }

    public function update(Post $post, StoreRequest $request){
        $data = $request->validated();

        $post->update($data);

        return view ('posts');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/Posts./view');
            
    }
}