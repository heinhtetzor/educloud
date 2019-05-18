@extends('layouts.app')

@section('title', 'Edu Cloud - ')

@section('content')

<div id="root">
   <div class="container">
         <strong>{{ str_replace('-', ' ', $course->title) }}</strong> by {{ $course->user['name'] }} <br>


      Courses are - 
      @foreach($sub_courses as $sub)
         <p><a href="{{ route('blog.show', ['name' => $sub->title]) }}"/>{{ str_replace('-', ' ', $sub->title) }}</a></p>
         

      @endforeach
      

   </div>
</div>


@endsection