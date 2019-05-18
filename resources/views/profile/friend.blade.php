@extends('layouts.app')

@section('title', 'Edu Cloud - ' .Auth::user()->name)

@section('content')
<script src="{{ asset('js/follow.js') }}" defer></script>
  <div id="root-profile">
    <div class="container" style="padding-top: 70px;">

      <div class="rootProfile" style="padding: 20px;">
        <div class="row">
          <div class="col-md-4 text-center">

            @if( $user->photo )
              <a href="../storage/profile/{{ $user->photo }}" target="_blank">
                <img src="../storage/profile/{{ $user->photo }}" class="mr-3 rounded-circle" style="width: 150px; 
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
                <button class="btn btn-info btn-sm action-follow" data-id="{{ $user->id }}" style="border-radius: 20px; width: 120px; padding: 5px;">
                  <strong>
                    @if(auth()->user()->isFollowing($user))
                      UnFollow
                    @else
                      Follow
                    @endif
                  </strong>
                </button>
                <button type="button" class="btn btn-dark btn-sm" style="border-radius: 20px; width: 120px; padding: 5px;">Message</button>
     
              </div>
            </div>
          </div>
        </div>
      </div>

  
         
            <a class="nav-item" id="nav-home-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="nav-home" aria-selected="true">Followers <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></a>
            <a class="nav-item" id="nav-profile-tab" data-toggle="tab" href="#following" role="tab" aria-controls="nav-profile" aria-selected="false">Following <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></a>
          
        </nav>
      
        {{-- it show people who followed you and people that you followed --}}
        {{-- @include('userList', ['users'=>$user->followers()->get()]) --}}
        {{-- @include('userList', ['users'=>$user->followings()->get()]) --}}
           
        
      

  
         {{-- <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" />
            <input type="submit" value="Upload"/>
        </form>  --}}

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
                <p>{{ $post->title }}

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