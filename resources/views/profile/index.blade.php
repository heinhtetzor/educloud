@extends('layouts.app')

@section('title', 'Edu Cloud - ' .Auth::user()->name)

@section('content')
<script src="{{ asset('js/follow.js') }}" defer></script>
  <div id="root-profile">
    <div class="container" style="padding-top: 70px;">

      <div class="rootProfile" style="padding: 20px;">
        <div class="row">
          <div class="col-md-4 text-center">

            @if( Auth::user()->photo )
              <a href="../storage/profile/{{ Auth::user()->photo }}" target="_blank">
                <img src="../storage/profile/{{ Auth::user()->photo }}" class="mr-3 rounded-circle" style="width: 150px; 
                  line-height: 96px;
                  border: 4px solid #fff;
                  -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.35);
                  box-shadow: 0 2px 6px rgba(0,0,0,0.35);">
              </a>
            @else
              <a href="../storage/profile/default/user.png" target="_blank">
                <img src="{{ asset('storage/profile/default/user.png') }}" class="mr-3 rounded-circle" style="width: 150px;
                  line-height: 96px;
                  border: 4px solid #fff;
                  -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.35);
                  box-shadow: 0 2px 6px rgba(0,0,0,0.35);
                  ">
              </a>
            @endif

          </div>
        
          <div class="col-md-8 text-center">
            <h1>{{ $user->name }} </h1>

            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-info" style="border-radius: 20px; width: 120px; padding: 5px;" data-id="{{ $user->id }}">
                  @if(auth()->user()->isFollowing($user))
                      UnFollow
                  @else
                      Follow
                  @endif
                </button>
  
                  
               
                <button type="button" class="btn btn-dark" style="border-radius: 20px; width: 120px; padding: 5px;">Message</button>
                <div>followers: {{ $user->followers()->get()->count() }} </div>
                <div>Followings: {{ $user->followings()->get()->count() }} </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  
         <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" />
            <input type="submit" value="Upload"/>
        </form> 

        <div class="row user-section" style="margin-top: 30px;">
          <div class="col-md-4">
              <ul class="nav" style="display: block;">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                  </li>
                </ul>

          </div>

          <div class="col-md-8">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="home">
            
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
        <div class="tab-pane container fade" id="menu1">...</div>
        <div class="tab-pane container fade" id="menu2">...</div>
      </div> 
          </div>
        </div>
      
          
        

    </div>
  </div>


@endsection