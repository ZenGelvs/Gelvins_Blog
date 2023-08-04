<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\User\Posts\StoreRequest;

class PostController extends Controller
{
    //Retrieve all Posts
    public function index(){
        return PostResource::collection(Post::all());
    }

    //Store Post
    public function store(StoreRequest $request){
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post);
     }

    //Retrieve Specific Post
    public function edit(Post $post){
        return PostResource::make($post);
    }

    //Retrieve Specific Post
    public function show(Post $post){
        return PostResource::make($post);
    }

    //Delete Post
    public function destroy(Post $post){
        $post->delete();
        return response()->json([
            'message' => "Post Deleted"
        ]);
    }

    //Update Post
    public function update(StoreRequest $request, Post $post){
        $data = $request->validated();
        $post->update($data);
        return PostResource::make($post);
    }
    
}