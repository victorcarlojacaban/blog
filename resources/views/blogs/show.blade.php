@extends('layouts.layout')


@section('content')

 <article>
  <!--   <form class="dropzone" method="POST" action="/blogs/{{ escape_url($blogs->title) }}/photo">
        {!! csrf_field() !!}
    </form> -->

       <!--  @foreach($blogs->photos as $photo)
            <div class="col-md-3">
                 <img src="{{ $photo->path }}">
            </div>
        @endforeach -->
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1>{!! $blogs->title !!}</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-container">
                        {!! $blogs->content !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  Author:  {!! $blogs->user->name !!}
                </div>
                 <div class="col-lg-4 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <i>Date Posted: {!! $blogs->updated_at !!}</i>
                </div>
            </div>
        </div>
         <hr>
         <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <a href="/blogs" class="btn btn-primary">Return to list</a>
                    @if( Auth::user()->id == $blogs->user->id || Auth::user()->isAdmin())
                        <a href="/blogs/{{ escape_url($blogs->title) }}/edit" class="btn btn-warning">Edit Post</a>
                      <button class="btnDelete">Delete</button>
                        {!! Form::open([
                                'id' => 'deleteForm',
                                'method' => 'DELETE',
                                'route' => ['blogs.destroy', $blogs]
                        ]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
         <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h3>Comments</h3>
                </div>
            </div>
        </div>

         <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! Form::open(['route' => ['comments.store', $blogs->id]]) !!} 
                         <div class="well">
                         <h4>Leave a Comment:</h4>               
                            <div class="form-group">
                               {!! Form::hidden('blogs_id',$blogs->id,['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                            </div>
                            <div>
                                {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                            </div>      
                        </div>
            
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <hr/>
         <div class="container">
            <div class="row">
                @foreach($comment as $comments)
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{!! $comments->user->name !!}
                                <small>at {!! $comments->created_at; !!}</small>
                            </h4>
                            {!! $comments->content !!}
                        </div>
                    </div>
                    <br/>
    
                </div>
                @endforeach
              
            </div>
        </div>
    </div>

</article>
@stop