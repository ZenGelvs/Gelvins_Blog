@extends('layout.index')  
@section('Content')
<div> 
    
    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" > Edit Post </h1> <br><br>
            <form action="{{route('posts.update', $post->id)}}" method="POST"> 
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->Title}}"> <br><br>
            <textarea name="body">{{$post->Body}}</textarea> <br>
            <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed">Save</button>
            </form>

            <form action="{{route('posts.return')}}" method='post'> 
                @csrf
            <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> Back </button>
            </form>
</div> 
@endsection