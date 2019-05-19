@extends('layouts.app')

@section('title', 'Edu Cloud - ' . str_replace('-', ' ', $post->title))

@section('content')
<div id="root">
    <div class="container">
        <h3 class="text-capitalize"> {{ str_replace('-', ' ', $post->title) }} </h3>
        <p> {!! $post->body !!} </p>
    </div>

    
    <div class="container">
        @foreach($comments as $comment)
            
            <div class="media border p-3">
                @if( $comment->author['photo'] )
                    <img src="../../storage/profile/{{ $comment->author['photo'] }}" class="mr-3 rounded-circle" style="width:40px;">
                @else 
                    <img src="{{ asset('../../storage/profile/default/user.png') }}" class="mr-3 rounded-circle" style="width:40px;">
                @endif
                <div class="media-body">
                    <h4>{{ $comment->author['name'] }}</h4>
                    <p>{!! $comment->body !!}</p>
                </div>
            </div>
            <br>
        @endforeach

    </div>
    <br>
        <div class="container">
                @if(Auth::check())
            <div class="discuss-section">

                <form method="POST" action="{{ url('/wiki/comment') }}" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    
                    <textarea name="comment" class="form-control body" id="comment-field">
                        
                    </textarea> <br>

                    <script src="{{ URL::asset('js/comment-field.js') }}"></script>

                    <button type="submit" class="btn btn-info">publish</button> 

                </form>
            </div>

            @else 
        
                <h1>Please log in </h1>
            @endif
            
        </div>
</div>
@endsection