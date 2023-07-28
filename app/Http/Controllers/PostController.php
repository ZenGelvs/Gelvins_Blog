<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    //Create post and return to addpost view
    public function store(StorePostRequest $request){
        
        $incomingFields = $request->validated();
        Post::create($incomingFields);
       return view ('posts');
    }

    //show index view and contents of posts 
    public function index(){
        $posts = Post::all();
        return view ('view', ['posts' => $posts]);
    }

    //return to addpost view
    public function return(){
        return view ('posts');
    }

    //edit function that retries data from db
    public function edit(Post $posts){
        return view('edit', ['posts'=>$posts]);
    }

    public function update(Post $posts, StorePostRequest $request){
        $incomingFields = $request->validated();

        $posts->update($incomingFields);

        return view ('posts');
    }

    public function destroy(Post $posts){
        $posts->delete();
        return redirect('/');
            
    }

    

}