@extends('layout')


@section('content')

 <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1>{{ $blogs->title }}</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ $blogs->content }}
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  Author:  {{ $blogs->user->name }}
                </div>
                 <div class="col-lg-4 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <i>Date Posted: {{ $blogs->updated_at }}</i>
                </div>
            </div>
        </div>
         <hr>
         <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <a href="/blogs" class="btn btn-primary">Return to list</a>
                    @if( Auth::user()->id == $blogs->user->id)
                        <a href="/blogs/{{ $blogs->id }}/edit" class="btn btn-warning">Edit Post</a>
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
        {!! Form::open(['route' => ['comments.store', $blogs->id]]) !!}
         <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div id="comment_form">
                         <div class="form-group">
                           {!! Form::hidden('blogs_id',$blogs->id,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                        </div>
                        <div>
                            {!! Form::submit('Add Comment', ['class' => 'submitComment']) !!}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <hr/>
         <div class="container">
            <div class="row">
                @foreach($comment as $comments)
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <li>
                        <div  style="background-color:#D6CBCB;">
                            <header><b><a href="javascript:void(0);">{{ $comments->user->name }}</a></b> - 
                            <span>said on <i>{{ $comments->created_at }}</i></span></header>
                            <ul>
                                <li> <p>{{ $comments->content }}</p> </li>
                            </ul>
                        </div>
                    </li>
    
                </div>
                @endforeach
              
            </div>
        </div>

</article>
@stop