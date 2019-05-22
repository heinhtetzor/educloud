@extends('layouts.app')

@section('content')
<div id="root">
    <div class="container">
        <div class="note text-center">
            <div class="text-danger">
                <p>These are temporary links for testing ..
                you can find below links from right button</p>
            </div>
        </div>
        <div class="row text-center" style="margin-bottom: 20px;">
            <div class="col-6">
                <a href="{{ url('wiki') }}" class="btn btn-outline-success">newfeed</a>
            </div>
            <div class="col-6">
                    <a href="{{ url('tags') }}" class="btn btn-outline-success">Create tags</a>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-6">
                <a href="{{ url('profile') }}" class="btn btn-outline-success">Profile</a>
            </div>
            <div class="col-6">
                <a href="{{ url('courses') }}" class="btn btn-outline-success">Create Courses</a>
            </div>
        </div>
    </div>
</div>
@endsection
