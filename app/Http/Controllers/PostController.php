<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createpost(Request $request){
        $incomingFields = $request->validate([
            'body' => 'required',
            'title' => 'required'
        ]);
        
        $incomingFields[title] = strip_tags($incomingFields['title']);
        $incomingFields[body] = strip_tags($incomingFields['body']);
        Post::create($incomingFields);
        
    }
}
