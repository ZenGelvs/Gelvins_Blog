<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\User\Posts\StoreRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    //API ROUTES
    public function store(StoreRequest $request){
        $data = $request->validated();
        Post::create($data);
        return response()->json([
            'status' => 200,
            'message' => "Post added successfully"
            ], 200);
    }
   
   public function index(){
        $post = Post::all();
        $data=[
            'status' => 200,
            'post' => $post,
        ];
        return response()->json($data, 200);
    }

    public function show($id){
        $post = Post::find($id);
            return response()->json([
                'status' => 200,
                'post' =>  $post
                ], 200);
    }

    public function update(StoreRequest $request, int $id){
        $data = $request->validated();
        
        $post = Post::find($id);
        
        Post::update($data);
        return response()->json([
            'status' => 200,
            'message' => "Post Updated successfully"
            ], 200);
    }

    public function destroy($id){
        $post=Post::find($id);
        if($post){
            $post->delete();
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Post Found"
                ], 200);
        }

    }

    //VIEW ROUTES

     /* public function store(StoreRequest $request){
        $data = $request->validated();
        Post::create($data);
        return redirect()->back();
    }*/
    
 /*
    public function index(){
        $post = Post::all();
        return view ('view', ['post' => $post]);
    }*/

    public function edit(Post $post){
        return view('edit', ['post'=>$post]);
    }

    /*public function update(Post $post, StoreRequest $request){
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.index');
    }*/

    /*public function destroy(Post $post){
        $post->delete();
        return redirect()->back();
    }*/
}