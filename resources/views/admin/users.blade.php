@extends('layouts.adminLayout')


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <h2>Users</h2></h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <thead>
                                    <tr>
                                        <td><a href="/admin/users/{{ escape_url($user->name) }}">{!! $user->id !!}</a></td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $user->created_at !!} </td>
                                        <td>
                                            <div class="col-md-4">
                                                <a href="/admin/users/{{ escape_url($user->name) }}" class="btn btn-primary">View</a>
                                            </div>
                                            <div class="col-md-4">
                                                    <button class='btnDelete' type="submit">Delete</button>
                                                    {!! Form::open([
                                                            'id' => 'deleteForm',
                                                            'method' => 'DELETE',
                                                            'route' => ['admin.destroy', $user->id]
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