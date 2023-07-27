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
       return view ('addposts');
    }

    //show index view and contents of posts 
    public function index(){
        $posts = Post::all();
        return view ('posts.viewposts', ['posts' => $posts]);
    }

    //return to addpost view
    public function return(){
        return view ('posts.addposts');
    }

    //edit function that retries data from db
    public function edit(Post $posts){
        return view('posts.editposts', ['posts'=>$posts]);
    }

    public function update(Post $posts, Request $request){
        $incomingFields = $request->validated();

        $posts->update($incomingFields);

        return view ('posts.addposts');
    }

    public function destroy(Post $posts){
        $posts->delete();
        return redirect('/');
            
    }

    

}
