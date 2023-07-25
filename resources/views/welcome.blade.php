<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gelvin's Blog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            
        </style>
    </head>

    <body >
        
        <div style = "border: 3px solid black;"> 
        <h2>Create A new post</h2>
        <form action="/create-post" method="POST">
            <input type="text" name="title" placeholder="Your Title"><br>
            <textarea name="body" placeholder="Write your post here:"></textarea><br><br>
            <button> Post </button>
        </form>
             </div> 
    </body>
</html>
