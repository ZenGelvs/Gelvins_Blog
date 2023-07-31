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
       return redirect ('/');
    }

    //show index view and contents of posts 
    public function index(){
        $post = Post::all();
        return view ('view', ['posts' => $post]);
    }

    //edit function that retries data from db
    public function edit(Post $posts){
        return view('edit', ['post'=>$posts]);
    }

    //delete function
    public function destroy(Post $posts){
    $posts->delete();
    return view('posts');
    }


    public function update(Post $posts, StoreRequest $request){
        $data = $request->validated();
        $posts->update($data);
        return view ('posts');
    }

    

    

}
