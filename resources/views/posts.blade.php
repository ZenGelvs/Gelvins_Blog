@extends('layout.index')  
@section('Content')
<div> 
    
     <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Create A new post</h1><br>
     <form action="{{route('posts.store')}}" method="POST">
         @csrf
         <input type="text" name="title" placeholder="Your Title"><br><br>
         <textarea rows="8" cols="50" name="body" placeholder="Write your post here:"></textarea><br><br>
         <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> Post </button>
         
     </form>
         <form action='{{route('posts.index')}}' method='POST'> 
         @csrf
         <a href="{{route('posts.index')}}" class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> View Posts </a>
         </form>
 </div> 
    
</div> 
@endsection