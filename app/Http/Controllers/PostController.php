<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Posts\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * store
     *
     * @param  App\Http\Requests\User\Posts\StoreRequest  $request Instance of the StoreRequest class for validation
     * @return Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Post::create($data);

        return redirect()->back();
    }

    /**
     * Retrieve a collection of Post resources.
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index()
    {
        $post = Post::all();

        return view('view', ['post' => $post]);
    }

    /**
     * Redirect to edit post screen
     *
     * @param  App\Models\Post  $post The instance of the Post model.
     * @return Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('edit', ['post' => $post]);
    }

    /**
     * Update post resource
     *
     * @param  App\Models\Post  $post The instance of the Post model.
     * @param  App\Http\Requests\User\Posts\StoreRequest  $request Instance of the StoreRequest class for validation
     * @return Illuminate\Http\Response
     */
    public function update(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $post->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Destroy post resource
     *
     * @param  Post  App\Models\Post  $post The instance of the Post model.
     * @return Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
