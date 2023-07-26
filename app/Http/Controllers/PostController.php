<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Create post and return to addpost view
    public function createpost(Request $request){
        $incomingFields = $request->validate([
            'body' => 'required',
            'title' => 'required'
        ]);
        
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        Post::create($incomingFields);
       return view ('/addposts');
    }

    //show index view and contents of posts 
    public function index(){
        $posts = Post::all();
        return view ('viewposts', ['posts' => $posts]);
    }

    //return to addpost view
    public function return(){
        return view ('/addposts');
    }

    //edit function that retries data from db
    public function editPostScreen(Post $posts){
        return view('editposts', ['posts'=>$posts]);
    }

    public function editPostReal(Post $posts, Request $request){
        $incomingFields = $request->validate([
            'body' => 'required',
            'title' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $posts->update($incomingFields);

        return view ('/addposts');
    }

    public function deletePost(Post $posts){
        $posts->delete();
        return redirect('/');
            
    }
}
