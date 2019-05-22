@extends('layouts.app')

@section('title', 'Edu Cloud - ' . str_replace('-', ' ', $post->title))

@section('content')
<script src="{{ asset('js/follow.js') }}" defer></script>

    <div class="cover" style="background: rgb(72, 191, 131);">
        <div class="container text-center">
            <div class="badge item-header">Wiki</div>
            <h3 class="text-capatilized"> {{ str_replace('-', ' ', $post->title) }} <h3>
        </div>
    </div>

    <div class="container">
        <div class="mainpost-container">
            <div class="row">
                <div class="col-md-10">

                    <div class="streamPost {{ str_random(10) }}">
                        <div class="streamposter-info">
                            <div class="streamposter-image">
                                @if( $post->user['photo'] )
                                    <img src="../storage/profile/{{ $post->user['photo'] }}" width="50px" style="border-radius: 50%; border: 1px solid #ddd;">
                                @else 
                                    <img src="{{ asset('../storage/profile/default/user.png') }}" width="50px" style="border-radius: 50%; border: 1px solid #ddd;">
                                @endif
                            </div>
                            <div class="streamposter-meta">
                                <h2>{{ $post->user->name }}</h2>
                                <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="fz-2">
                            <p> {!! $post->body !!} </p>
                        </div>   
                    </div>
                    
                    <div class="badge lb-s">
                        <i class="fas fa-pen"></i> comments 
                    </div>

                    @foreach($comments as $comment)
                
                        <div class="media p-3">
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

                    <div class="discuss-section">
                        <form method="POST" action="{{ url('/wiki/comment') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                                    
                            <textarea name="comment" class="form-control body" id="comment-field"></textarea> <br>
                            <script src="{{ URL::asset('js/comment-field.js') }}"></script>

                            <button type="submit" class="btn btn-info">publish</button> 
                        </form>
                    </div>

                </div>
                <div class="col-md-2">
                    @if( $post->user_id != Auth::user()->id)
                    <div class="activity9">
                        <a href="#reply" class="btn btn-block replybtn" style="background:#e7672e; color: #fff;">Reply</a>
                        <button class="btn btn-success btn-block action-follow" data-id="{{ $user->id }}">
                            <strong>
                                @if(auth()->user()->isFollowing($user))
                                    UnFollow
                                @else
                                    Follow
                                @endif
                            </strong>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
 
@endsection