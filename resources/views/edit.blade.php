@extends('layout.index')  
@section('Content')
<div> 
    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" > Edit Post </h1> <br><br>
        <form action="{{route('post.update', $post->id)}}" method="POST"> 
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->Title}}"> <br><br>
            <textarea rows="8" cols="70" name="body">{{$post->Body}}</textarea> <br>
            <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed">Save</button> <br>
            <a href="{{route('post.index')}}" class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed"> Back </a>
        </form>
</div> 
@endsection