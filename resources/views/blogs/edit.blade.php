@extends('layouts.layout')


@section('content')

<div class="container">

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <h1>Update "{{ $blogs->title }}"</h1>
            </div>
        </div>
    </div>
    <hr>
    {!! Form::model($blogs, ['method' => 'PATCH','route' => ['blogs.update', $blogs->id]]) !!}
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title',$blogs->title,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! Form::label('content', 'Content:') !!}
                    {!! Form::textarea('content', $blogs->content, ['class'=>'textarea']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!} 
                <a href="/blogs" class="btn btn-primary">Back to List</a> 
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@stop