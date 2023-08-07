<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Posts\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * store
     *
     * @param  mixed  $request Instance of the StoreRequest class for validation
     * @return void
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Post::create($data);

        return redirect()->back();
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $post = Post::all();

        return view('view', ['post' => $post]);
    }

    /**
     * edit
     *
     * @param  mixed  $post Injection of Post.php model
     * @return void
     */
    public function edit(Post $post)
    {
        return view('edit', ['post' => $post]);
    }

    /**
     * update
     *
     * @param  mixed  $post Injection of Post.php model
     * @param  mixed  $request Instance of the StoreRequest class for validation
     * @return void
     */
    public function update(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $post->update($data);

        return redirect()->route('post.index');
    }

    /**
     * destroy
     *
     * @param  mixed  $post Injection of Post.php model
     * @return void
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
