@extends('layouts.app')

@section('title', 'Edu Cloud - Courses')
@section('content')


@if($course->user_id == Auth::user()->id)

<div id="root">
    <div class="container">
        <form action="{{ url('/courses/create') }}" method="POST">

            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="user" value="{{ Auth::user()->id }}">

            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <input type="text" name="title" class="form-control" placeholder="Enter courses name..."> <br>

            <textarea name="body" class="form-control body" id="body"></textarea> 
            <script src="{{ URL::asset('js/easy-image.js') }}"></script>

            <button type="submit" class="btn btn-success">Create courses</button>
        </form>
    </div>
</div>
@else

    <script>window.location.href="{{ URL::to('courses') }}"</script>
@endif

@endsection