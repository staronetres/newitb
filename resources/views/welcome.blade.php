@extends('layouts.app')
@section('content')
   
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif



             <!--HOME ICON SECTION  -->
                  <section id="" class="py-5">
                    <div class="container">
                         <h5 class="text-center">New IT Books</h5>
                        <div class="d-flex justify-content-between align-items-center">
                          
                         <a href="{{ url('/blog') }}">Blog</a>
                         <a href="{{ url('/login') }}">Login</a>
                         <a href="{{ url('/register') }}">Register</a>
                                   
                          
                        </div>
                        
                     
                    </div>
                  </section>


           
        </div>



  
@endsection
