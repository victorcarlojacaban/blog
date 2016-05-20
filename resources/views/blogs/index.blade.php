@extends('layouts.layout')


@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
             	@foreach($blogs as $blog)
	                <div class="post-preview">
	                    <a href="{{ route('blogs.show', $blog->id) }}">
	                        <h2 class="post-title">{{ $blog->title }}</h2>
	                     </a>
                        <div class="post-subtitle">
                        	{{ $blog->content }}
                        </div>
	                    <p class="post-meta">Posted by <a href="#">{{ $blog->user->name }}</a> {{ $blog->updated_at }}</p>
	                    <div class="col-md-12" id="actionButtons">
	                    	<table class="table">
	                    		<tr>
	                    			<td> <a href="/blogs/{{ $blog->id }}" class="btn btn-success">Read More</a></td>
	                    			@if( Auth::user()->id == $blog->user->id)
	                    			<td><a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">Edit Post</a></td>
									<td><button id="btnDelete" class="btn btn-danger">Delete</button>
										{!! Form::open([
						          			'id' => 'deleteForm',
								            'method' => 'DELETE',
								            'route' => ['blogs.destroy', $blog]
								        ]) !!}
								        {!! Form::close() !!}	
									</td>
	                    			<!-- <td>
	                    				{{ csrf_field() }}
						          		{!! Form::open([
						          			'id' => 'deleteForm',
								            'method' => 'DELETE',
								            'route' => ['blogs.destroy', $blog]
								        ]) !!}
								        {!! Form::submit('Remove', ['class' => 'btn btn-danger', 'id' => 'btnDelete']) !!}
								        {!! Form::close() !!}								     
	                    			</td> -->
	                    			@endif
	                    		</tr>
	                    	</table>
		                </div>
	                </div>
	                <hr>
	                <ul class="pager">
	                    <li class="next">
	                        <a href="#">Older Posts &rarr;</a>
	                    </li>
	                </ul>
                @endforeach
            </div>
        </div>
    </div>
@stop

