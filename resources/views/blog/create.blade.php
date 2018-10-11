@extends('layouts.app')
@section('content')

<main class="container">
  <div class="container-fluid">
    <div class="jumbotron">
       <h1>Create a blog posts</h1>
   </div>
   <div class="col-sm-10 col-sm-offset-4">
    {!! Form::open(['method' => 'POST','action' => 'BlogController@store']) !!}

   <div class="form-group">
    {!! Form::label("title", "Title:") !!}
    {!! Form::text("title", null, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group">
       {!! Form::label("body", "Body") !!}  
       {!! Form::textarea("body", null, ['class' => 'form-control']) !!}
    </div>

     <div class="form-group">
      {!! Form::label("category_id", "Category:") !!}
      {!! Form::select("category_id[]", $categories, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>


    <div class="form-group">
       {!! Form::submit("Create a Blog", ['class' => 'btn btn-primary']) !!}
    </div>

    </div>
    {!! Form::close() !!}

 
  </div>
 </div>
</main>




<hr>




@endsection



@include('partials.select-2-script')
