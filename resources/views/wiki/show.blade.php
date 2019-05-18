@extends('layouts.app')

@section('title', 'Edu Cloud - ' . str_replace('-', ' ', $post->title))

@section('content')
<div id="root">
    <div class="container">
        <h3> {{ str_replace('-', ' ', $post->title) }} <h3>
        <p> {!! $post->body !!} </p>
    </div>

    

        <div class="container">
                @if(Auth::check())
            <div class="discuss-section">

                <textarea name="comment" class="form-control body" id="comment-field">
                    
                </textarea> 

                <script src="{{ URL::asset('js/comment-field.js') }}"></script>
            </div>

      
    @else 
   
        <h1>Please log in </h1>
    @endif
</div>
</div>
@endsection