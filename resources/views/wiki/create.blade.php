@extends('layouts.app')

@section('title', 'Edu Cloud - New Wiki')

@section('content')
<div id="root">
    <div class="container">
        <form method="POST" action="{{ url('/wiki/store') }}" enctype="multipart/form-data">

            {!! csrf_field() !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="user" value="{{ Auth::user()->id }}">

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Story title">
                </div>
                <div class="col-md-4">
                    <select name="tags" class="form-control" tabindex="1">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->name }}">{{ str_replace('-', ' ', $tag->name) }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
          


            <textarea name="body" class="form-control body" id="body"></textarea> 
            <script src="{{ URL::asset('js/easy-image.js') }}"></script>

            <button type="submit" class="btn btn-success">Publish</button>
        </form>    
    </div>
</div>
   
@endsection