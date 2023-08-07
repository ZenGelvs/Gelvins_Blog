<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\User\Posts\StoreRequest;

class PostController extends Controller
{
    /*
    *Views all post contents in paginated format
    *
    *@param $post Injection of Post.php model
    *@return A collection of Post resources in a JSON suitable and paginated format
    *
    */
    public function index(Post $post){
        $post = Post::query()->paginate(5);
        return PostResource::collection($post);
    }

    /*
    *Stores a post
    *
    *@param $request Instance of the StoreRequest class for validation
    *@return Stores a post in the db
    *
    */
    public function store(StoreRequest $request){
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post);
     }

    /*
    *Edit post
    *
    *@param $post Injection of Post.php model
    *@return an Instance of a post
    *
    */
    public function edit(Post $post){
        return PostResource::make($post);
    }

    /*
    *Show post
    *
    *@param $post Injection of Post.php model
    *@return an Instance of a post
    *
    */
    public function show(Post $post){
        return PostResource::make($post);
    }

    /*
    *Destroy a post
    *
    *@param $post Injection of Post.php model
    *@return JSON Response indicating post deletion
    *
    */
    public function destroy(Post $post){
        $post->delete();
        return response()->json([
            'message' => "Post Deleted"
        ]);
    }

    /*
    *Update post
    *
    *@param $post Injection of Post.php model
    *@param $request Instance of the StoreRequest class for validation
    *@return Stores a post in the db
    *
    */
    public function update(StoreRequest $request, Post $post){
        $data = $request->validated();
        $post->update($data);
        return PostResource::make($post);
    }
    
}
