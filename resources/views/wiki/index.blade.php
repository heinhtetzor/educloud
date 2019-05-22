@extends('layouts.app')

@section('title', 'Edu Cloud - wiki')

@section('navbar-addition')
    
{{-- Addition for navbar --}}

@endsection

@section('content')

<div id="root">
    <div class="container">
        <div class="postStream-container {{ str_random(8) }}">
            <div class="row">
                <div class="col-md-2">
           
                </div>
                <div class="col-md-10">
                    @foreach($posts as $post)
                    
                    <div class="postItem-stream blog-{{ str_random(5) }}">
                        <div class="row">
                            <div class="col-10 postMeta-data">
                                <div class="owner">
                                    @if( $post->user['photo'] )
                                        <img src="../storage/profile/{{ $post->user['photo'] }}" width="35px" style="border-radius: 50%; border: 1px solid #ddd;">
                                    @else 
                                        <img src="{{ asset('../storage/profile/default/user.png') }}" width="35px" style="border-radius: 50%; border: 1px solid #ddd;">
                                    @endif
                                </div>
                                <div class="postMeta-header">
                                    <h3><a href="{{ route('wiki.show', ['title' => $post->title ]) }}">
                                        {{ str_replace('-', ' ', $post->title) }}
                                    </a></h3>
                                    <div class="postItem-activity">
                                        <div class="badge category-name" style="background: rgb(72, 191, 131);">
                                            <span> <a href="{{ route('tags.show', ['name' => $post->tags]) }}">{{ str_replace('-', ' ', $post->tags) }}</a></span>
                                        </div>
                                        <span class="thisPost-owner"> <a href="profile/{{ $post->user->id }}">{{ $post->user->name }}</a></span>
                                        <span class="text-muted">posted </span>
                                        <span class="text-muted-blacker">
                                        {{ $post->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 text-right postMeta-viewer">
                                <div class="badge viewer">
                                  {{-- <i class="fas fa-eye"></i>  --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach     
                    
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection