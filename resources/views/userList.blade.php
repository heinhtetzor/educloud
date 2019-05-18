@if($users->count())
    @foreach($users as $user)
        <div class="col-2 profile-box border p-1 rounded text-center bg-light mr-4 mt-3">
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
            {{-- <img src="https://dummyimage.com/165x166/420542/edeef5&text=ItSolutionStuff.com" class="w-100 mb-1"> --}}
            <h5 class="m-0"><a href="{{ route('user.view', $user->id) }}"><strong>{{ $user->name }}</strong></a></h5>
            <p class="mb-2">
                <small>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></small>
                <small>Followers: <span class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
            </p>
            <button class="btn btn-info btn-sm action-follow" data-id="{{ $user->id }}"><strong>
            @if(auth()->user()->isFollowing($user))
                UnFollow
            @else
                Follow
            @endif
            </strong></button>
        </div>
    @endforeach
@endif