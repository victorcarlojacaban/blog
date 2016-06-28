@extends('layouts.adminLayout')


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <h2>Blog Posts</h2></h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
                                    <th>Update Date</th>
                                     <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <thead>
                                    <tr>
                                        <td><a href="/admin/post/{{ escape_url($blog->title) }}">{!! $blog->title !!}</a></td>
                                        <td><i>{!! $blog->user->name !!}</i></td>
                                        <td>{!! $blog->created_at !!} </td>
                                        <td>{!! $blog->updated_at !!} </td>
                                        <td>
                                            <div class="col-md-4">
                                                <a href="/admin/post/{{ escape_url($blog->title) }}" class="btn btn-primary">View</a>
                                            </div>
                                            <div class="col-md-4">
                                                    <button class='btnDelete' type="submit">Delete</button>
                                                    {!! Form::open([
                                                            'id' => 'deleteForm',
                                                            'method' => 'DELETE',
                                                            'route' => ['admin.destroyBlog', $blog->id]
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                 </thead>
                            @endforeach
                        </tbody>
                </table>
            </div>
    </div>
@stop