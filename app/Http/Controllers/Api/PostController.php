<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Posts\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * index
     *
     * @param  mixed  $post
     * @return void
     */
    public function index(Post $post)
    {
        $post = Post::query()->paginate(5);

        return PostResource::collection($post);
    }

    /**
     * store
     *
     * @param  mixed  $request
     * @return void
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);

        return PostResource::make($post);
    }

    /**
     * edit
     *
     * @param  mixed  $post
     * @return void
     */
    public function edit(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * show
     *
     * @param  mixed  $post
     * @return void
     */
    public function show(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * destroy
     *
     * @param  mixed  $post
     * @return void
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'Post Deleted',
        ]);
    }

    /**
     * update
     *
     * @param  mixed  $request
     * @param  mixed  $post
     * @return void
     */
    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        return PostResource::make($post);
    }
}
