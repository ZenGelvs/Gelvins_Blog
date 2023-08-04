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
        if($post){
            return PostResource::make($post);
        }else{
            return response()-> json([
                    'message'=> 'Post Not Successful'
            ]);
         }
     }

    //Retrieve Specific Post
    public function edit(Post $post){
        if($post){
            return PostResource::make($post);
        }else{
            return response()->json([
                'message' =>  'Post not found'
            ]);
        }
    }

    //Retrieve Specific Post
    public function show(Post $post){
        if($post){
            return PostResource::make($post);
        }else{
            return response()->json([
                'message' =>  'Post not found'
            ]);
        }
    }

    //Delete Post
    public function destroy(Post $post){
        if($post){
            $post->delete();
            return response()->json([
                'message' => "Post Deleted"
            ]);
        }else{
            return response()->json([
                'message' => "No Post Found"
            ]);
        }
    }

    //Update Post
    public function update(StoreRequest $request, Post $post){
        $data = $request->validated();
        if($post){
            $post->update($data);
            return PostResource::make($post);
        }else{
            return response()-> json([
                   'message'=> 'Update Not Successful'
            ]);
        }
    }
    
}