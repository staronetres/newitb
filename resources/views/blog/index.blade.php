@extends('layouts.app')
@section('content')

<main class="container">
  <div class="container-fluid">
    <div class="jumbotron">
       <h1>Latest blog posts</h1>
   </div>
   <div class="col-md-10 col-md-offset-2">


<h1>Latest blog posts</h1>

@foreach ($blogs as $blog)


<article>

<h2><a href="{{ action('BlogController@show', [$blog->id]) }}">{{ $blog->title }}</a></h2>
<p>{{ $blog->body }}</p>


</article>


@endforeach

 </div>
 </div>
</main>




<hr>




@endsection