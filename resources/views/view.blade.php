@extends('layout.index')  
@section('Content')
<div> 
    
    <div>
        <div>
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">My Posts</h2>

        </div>

        <div  style= "padding:10px; margin:10px" > 
            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" > All posts  </h1>

            @foreach($posts as $post)
                <div style="background-color: #1C3152; padding: 50px; margin-top: 100px; margin 20px 50px 20px 50px; padding: 40px 200px 60px 200px;"     
                class="dark:text-white" > 
                    <h3 style = "font-size: 60px;">{{$post['Title']}}</h3>

                    <div style=" font-size: 30px;">
                    {{$post['Body']}}
                    </div>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed" style="font-size:20px;">
                        <a href="{{route('posts.edit', $post->id)}}">Edit</a></p>

                    <form action="{{route('posts.destroy', $post->id)}}" method="POST"> 
                    @csrf
                    @method('DELETE')
                    <button class="mt-4 text-gray-500 dark:text-gray-400 c leading-relaxed" style="font-size:20px;">Delete</button>
                </form>

                </div>

            @endforeach

        </div>

    </div>  
</div> 
@endsection