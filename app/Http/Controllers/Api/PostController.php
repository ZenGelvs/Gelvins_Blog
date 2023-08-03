<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\User\Posts\StoreRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //API ROUTES
    //Working:

    public function index(){
        $post = Post::all();
        $data=[
            'status' => 200,
            'post' => $post,
        ];
        return PostResource::collection(Post::all());
    }

    public function show($id){
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
    //Not:

    public function store(StoreRequest $request){
        $data = $request -> validated();

        if($data->fails()){
            return response()->json([
                'status' => 422,
                'errors' =>  $validator->messages()
                ], 422);
        }else{
            Post::create($data);

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
        
        }
    
    public function update(StoreRequest $request, int $id){
        $data = $request -> validated();

        if($data->fails()){
            return response()->json([
                'status' => 422,
                'errors' =>  $data->messages()
                ], 422);
        }else{

            $post = Post::find($id);
            if($post){

                $post->update($data);
                return response()-> json([
                    'status'=>200,
                    'message'=> 'Post Updated Successfully'
                ], 200);
            }else{

            return response()-> json([
                    'status'=>404,
                    'message'=> 'Update Not Successful'
            ], 404);
            }
        }
    }

    
}