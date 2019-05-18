@extends('layouts.app')

@section('title', 'Edu Cloud - wiki')

@section('content')

<div id="root">
    <div class="container">
        <div class="postStream-container {{ str_random(8) }}">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ url('/home') }}">Home</a> <br>
                    <a href="{{ url('/tags') }}">tags</a> <br>
                    <a href="{{ url('/users') }}">Users </a>

                </div>
                <div class="col-md-10">
                    @foreach($posts as $post)

                    <div class="media p-3">
                            @if( $post->user['photo'] )
                                <img src="../storage/profile/{{ $post->user['photo'] }}" class="mr-3 rounded-circle" style="width:60px;">
                            @else 
                                <img src="{{ asset('storage/profile/default/user.png') }}" class="mr-3 rounded-circle" style="width:60px;">
                            @endif
                            <div class="media-body">
                                <h4><a href="{{ route('wiki.show', ['title' => $post->title ]) }}/">
                                 {{ str_replace('-', ' ', $post->title) }}
                                </a></h4>
                            
                            </div>
                        </div>
{{-- 
                    <div class="postStream-Item postStream--blog{{ mt_rand(100000, 999999) }}">
                        <div class="{{ str_random(8) }} blogPost-image">

                            @if( $post->user['photo'] )
                                <img src="../storage/profile/{{ $post->user['photo'] }}" width="35px" style="border-radius: 50%; border: 1px solid #ddd;">
                            @else 
                                <img src="{{ asset('storage/profile/default/user.png') }}" width="35px" style="border-radius: 50%; border: 1px solid #ddd;">
                            @endif

                        </div>
                        <div class="blogPost-meta">
                            <h3><a href="{{ route('wiki.show', ['title' => $post->title ]) }}/">
                                {{ str_replace('-', ' ', $post->title) }}
                            </a></h3>
                            <span>Posted by {{ $post->user['name'] }} </span>
                            <div class="badge">{{ $post->tags }}</div>
                            <span>Posted by {{ $post->created_at->diffForHumans()  }} </span>
                        </div>
                    </div> --}}
                    @endforeach       
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection