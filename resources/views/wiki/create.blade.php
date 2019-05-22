@extends('layouts.app')

@section('title', 'Edu Cloud - New Wiki')

@section('content')

<div id="root">
    <div class="container">
        <form method="POST" action="{{ url('/wiki/store') }}" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="user" value="{{ Auth::user()->id }}">

            <div class="row mb-2">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Story title">
                </div>
                <div class="col-md-4">
                    <input list="tags-list" name="tags" class="form-control" tabindex="1">
                    <datalist id="tags-list">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->name }}">{{ str_replace('-', ' ', $tag->name) }} </option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            


            <textarea name="body" class="form-control body" id="body"></textarea> 
            <script src="{{ URL::asset('js/easy-image.js') }}"></script>

            <button type="submit" class="btn btn-success">Publish</button>
        </form>    
    </div>
</div>
   
@endsection