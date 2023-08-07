<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Posts\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Retrieve a paginated collection of Post resources.
     *
     * @param  App\Models\Post  $post The instance of the Post model.
     * @return App\Http\Resources\PostResource
     */
    public function index(Post $post)
    {
        $post = Post::query()->paginate(5);

        return PostResource::collection($post);
    }

    /**
     * Store a new Post resource.
     *
     * @param  App\Http\Requests\User\Posts\StoreRequest  $request Instance of the StoreRequest class for validation
     * @return App\Http\Resources\PostResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);

        return new PostResource($post);
    }

    /**
     * Edit a Post resource
     *
     * @param  App\Models\Post  $post The instance of the Post model.
     * @return App\Http\Resources\PostResource
     */
    public function edit(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Show a post resource
     *
     * @param  App\Models\Post  $post The instance of the Post model.
     * @return App\Http\Resources\PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Destroy a post resource
     *
     * @param  \App\Models\Post  $post The instance of the Post model.
     * @return \Illuminate\Http\Response JSON response.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post Deleted',
        ]);
    }

    /**
     * Update a post resource
     *
     * @param  App\Http\Requests\User\Posts\StoreRequest  $request Instance of the StoreRequest class for validation
     * @param  App\Models\Post  $post The instance of the Post model.
     * @return App\Http\Resources\PostResource
     */
    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return PostResource::make($post);
    }
}
