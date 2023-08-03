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
        $data = $request -> validated();
            $post = Post::create($data);
            if($post){
                return response()-> json([
                    'status'=>200,
                    'message'=> 'Post Created Successfully'
                ], 200);
            }else{
                return response()-> json([
                    'status'=>500,
                    'message'=> 'Post Not Successful'
                ], 500);
            }
     }

    //Retrieve Specific Post
    public function edit( $id){
        $post = Post::find($id);

        if($post){
            return response()->json([
            'status' => 200,
            'post' =>  $post
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' =>  'Post not found'
                ], 404);
        }
    }

    //Retrieve Specific Post
    public function show($id){
        $post = Post::find($id);

        if($post){
            return PostResource::make($post);
        }else{
            return response()->json([
                'status' => 404,
                'message' =>  'Post not found'
                ], 404);
        }
    }

    //Delete Post
    public function destroy($id){
        $post=Post::find($id);
        if($post){
            $post->delete();
            return response()->json([
                'status' => 200,
                'message' => "Post Deleted"
                ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Post Found"
                ], 404);
        }
    }

    //Update Post
    public function update(StoreRequest $request, int $id){
        $data = $request -> validated();
        $post = Post::find($id);

        if($post){
            $post->update($data);
            return PostResource::make($post);
        }else{
            return response()-> json([
                'status'=>404,
                   'message'=> 'Update Not Successful'
            ], 404);
        }
    }
    
}