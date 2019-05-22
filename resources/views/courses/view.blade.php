@extends('layouts.app')

@section('title', 'Edu Cloud - ')

@section('content')

<div class="container">
   

        @foreach($blogs as $blog)

            <p>{{ $blog->title }} </p>
            <p>{!! $blog->body !!} </p>

        @endforeach
    
    

</div>


@endsection