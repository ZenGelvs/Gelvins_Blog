@extends('layout.index')  
@section('Content')
<div> 
        <div>
            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"> Create A new post </h1><br>
                <form action="{{route('post.store')}}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Your Title"><br><br>
                    <textarea name="body" rows="8" cols="70" placeholder="Write your post here:"></textarea><br><br>
                    <button class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed"> Post </button>
                </form>
        </div>
        <div  style="padding:10px; margin:10px" > 
            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"> All posts </h1>
            @foreach($post as $post)
            <div style="background-color: #1C3152; padding: 50px; margin-top: 80px; margin 20px 50px 20px 50px; padding: 40px 200px 60px 200px;"     
            class="dark:text-white"> 
                <h3 style="font-size: 60px;">{{$post['title']}}</h3>
                    <div style="font-size: 30px;">
                        {{$post['body']}}
                    </div>
                <a href="{{route('post.edit', $post->id)}}" class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed" style="font-size:20px;">Edit</a>
                <form action="{{route('post.destroy', $post->id)}}" method="POST"> 
                    @csrf
                    @method('DELETE')
                    <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed" style="font-size:20px;"> Delete </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>  
</div> 
@endsection