@extends('layout')


@section('content')

<!-- will be used to show any messages -->
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

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
	                    <div class="col-md-6">
			                <a href="/blogs/{{ $blog->id }}" class="btn btn-success">Read More</a>
			                 @if( Auth::user()->id == $blog->user->id)
			                 	 <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">Edit Post</a>
			                 @endif
			              <!--   <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">Edit Post</a> -->
			               <!--  <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-success">View Blog</a> -->
			                <!-- <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit Blog</a> -->
		                </div>
			            <div class="col-md-4">
			            	@if( Auth::user()->id == $blog->user->id)
				                {{ csrf_field() }}
				          		{!! Form::open([
						            'method' => 'DELETE',
						            'route' => ['blogs.destroy', $blog->id]
						        ]) !!}
						        {!! Form::submit('Remove Post', ['class' => 'btn btn-danger']) !!}
						        {!! Form::close() !!}
				       		@endif
				       	</div>
	                </div>
	                <hr>
	                <!-- Pager -->
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

