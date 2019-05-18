@extends('layouts.app')

@section('title', 'Edu Cloud - Courses')
@section('content')

<div class="{{ str_random(2) }}--{{ str_random(12) }}" id="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box">

                    <div class="border-bottom-line {{ str_random(20) }}">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">
                                    Create Course
                                </button>
                            </div>
                            <div class="col-6 text-right count-num">
                            See all
                            </div>
                        </div>
                        
                        <div></div>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ url('/courses') }}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                                            <input type="text" name="title" class="form-control" placeholder="Enter courses name..."> <br>
                                            <select name="tags" class="form-control" tabindex="1">
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->name }}">{{ str_replace('-', ' ', $tag->name) }} </option>
                                                @endforeach
                                            </select> <br>
                                            <button type="submit" class="btn btn-success">Create courses</button>
                                        </form>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 
                    </div>
                        
                    <div class="1zero {{ str_random(12) }}">
                        @foreach($courses as $course)
                        <div class="wo0q">
                            <div class="each-course">
                                <div class="link-to-read">
                                    <div class="heading">
                                        <a href="{{ route('courses.show', ['title' => $course->title]) }}/">{{ str_replace('-', ' ', $course->title) }}</a>
                                    </div>
                                </div>
                                <a href="{{ route('courses.create', ['title' => $course->title]) }}" class="btn btn-success btn-a"><i class="fas fa-plus"></i></a>
                                <span>created on {{ $course->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="board">
                    <div class="{{ str_random(12) }}" id="advertise">
                        <div class="text-center">
                            Edu - Cloud
                            <div>Myanmar Student Forum</div>
                        </div>
                    
                    </div>
                </div>

                <div class="site-course box">

                    <ul class="nav nav-pills nav-course">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
                        </li>
                    </ul>
                                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="courses">
                            @foreach($blogs as $blog)
                                <div class="media p-3">
                                    @if( $blog->user['photo'] )
                                        <img src="../storage/profile/{{ $blog->user['photo'] }}" class="mr-3 rounded-circle" style="width:60px;">
                                    @else 
                                        <img src="{{ asset('storage/profile/default/user.png') }}" class="mr-3 rounded-circle" style="width:60px;">
                                    @endif
                                    <div class="media-body">
                                      <h4>{{ $blog->user['name'] }}<small><i>{{ $blog->created_at->diffForHumans() }}</i></small></h4>
                                      <a href="{{ route('courses.show', ['name' => $blog->title]) }}"/>{{ str_replace('-', ' ', $blog->title) }}</a>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('div.wo0q').slice(3).addClass('hide');
    });
</script>
@endsection

