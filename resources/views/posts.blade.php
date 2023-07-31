@extends('layout.index')  
@section('Content')
<div> 
    <form method="GET"> 
        <a  class="mt-6 text-xl font-semibold text-gray-900 dark:text-white" href="{{route('posts.index')}}"> View Posts</a>
     </form>
        

    
</div> 
@endsection