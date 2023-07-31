@extends('layout.index')  
@section('Content')
<div> 
    
    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Create A new post</h1><br>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Your Title"><br><br>
        <textarea name="body" placeholder="Write your post here:"></textarea><br><br>
        <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> Post </button>
        
    </form>
        <form action='{{route('posts.index')}}' method='POST'> 
        @csrf
        <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> View Posts </button>
        </form>
</div> 
@endsection