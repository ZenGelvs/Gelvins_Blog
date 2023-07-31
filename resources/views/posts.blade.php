@extends('layout.index')  
@section('Content')
<div> 
    
        <form action='{{route('posts.index')}}' method='POST'> 
        @csrf
        <button class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"> View Posts </button>
        </form>
</div> 
@endsection