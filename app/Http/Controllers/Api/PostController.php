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
     * @param  Post  $post The instance of the Post model.
     * @return PostResource::collection
     */
    public function index(Post $post)
    {
        $post = Post::query()->paginate(5);

        return PostResource::collection($post);
    }

    /**
     * Store a new Post resource.
     *
     * @param  StoreRequest  $request Instance of the StoreRequest class for validation
     * @return PostResource::make
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);

        return PostResource::make($post);
    }

    /**
     * Edit a Post resource
     *
     * @param  Post  $post The instance of the Post model.
     * @return PostResource::make
     */
    public function edit(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * Show a post resource
     *
     * @param  Post  $post The instance of the Post model.
     * @return PostResource::make
     */
    public function show(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * Destroy a post resource
     *
     * @param  Post  $post The instance of the Post model.
     * @return JSON response.
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
     * @param  StoreRequest  $request Instance of the StoreRequest class for validation
     * @param  Post  $post The instance of the Post model.
     * @return PostResource::make
     */
    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return PostResource::make($post);
    }
}
