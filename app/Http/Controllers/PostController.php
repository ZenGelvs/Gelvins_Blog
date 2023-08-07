<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Posts\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * store
     *
     * @param  StoreRequest  $request Instance of the StoreRequest class for validation
     * @return redirect response back to the previous page.
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
     * @return view views.blade containing the list of posts
     */
    public function index()
    {
        $post = Post::all();

        return view('view', ['post' => $post]);
    }

    /**
     * Redirect to edit post screen
     *
     * @param  Post  $post The instance of the Post model.
     * @return view edit.blade containing the specific posts
     */
    public function edit(Post $post)
    {
        return view('edit', ['post' => $post]);
    }

    /**
     * Update post resource
     *
     * @param  Post  $post The instance of the Post model.
     * @param  StoreRequest  $request Instance of the StoreRequest class for validation
     * @return redirect response to post.index.
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
     * @param  Post  $post The instance of the Post model.
     * @return redirect response back to the previous page.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
