@extends('layouts.app')

@section('title', 'Edu Cloud - tags')
@section('content')
<div id="root">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ url('/tags') }}" method="POST">

                    {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
                    <input type="hidden" name="user" value="{{ Auth::user()->id }}">

                    <input type="text" name="tags" class="form-control" placeholder="Enter tags name..."> <br>

                    <button type="submit" class="btn btn-success">Create tags</button>
                </form>
            </div>
            <div class="col-md-8">
                    <h1>THis is tag section</h1>
                    @foreach($tags as $tag)
                        <div class="badge badge-success">
                            <a href="{{ route('tags.show', ['name' => $tag->name ]) }}">
                                {{ str_replace('-', ' ', $tag->name) }}
                            </a>
                        </div> <br>


                    @endforeach
            </div>

        </div>
    </div>

</div>

@endsection