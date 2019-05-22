@extends('layouts.app')

@section('title', 'Edu Cloud - ' .Auth::user()->name)

@section('content')
<script src="{{ asset('js/follow.js') }}" defer></script>

<div id="root">
    <div class="container">
        @foreach($users as $user)

    <div class="row userItem-activity-row">
            <div class="col-6">
                <div class="user-item">
                    <div class="user-item-image">
                        @if( $user->photo )
                            <img src="../storage/profile/{{ $user->photo }}" class="mr-3 rounded-circle" style="width:60px;">
                        @else 
                            <img src="{{ asset('storage/profile/default/user.png') }}" class="mr-3 rounded-circle" style="width:60px;">
                        @endif
                    </div>
                    <div class="user-item-feed">
                    <a href="profile/{{ $user->id }}"> {{ $user->name }}</a>
                        <p class="text-muted">{{ $user->job }}</p>
                    </div>
                </div>
            </div>


            <div class="col-6 text-center">
         
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection