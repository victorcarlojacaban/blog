@extends('layouts.adminLayout')


@section('content')
	 <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <h2>Post Details</h2></h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
	        		<td>
	        			<div class="col-md-8">{!! $blogs->title !!}</div>
	        		</td>
	        		</tr>
	        		<tr>
	        		<td>
	        			<div class="col-md-8">{!! $blogs->content !!}</div>
	        		</td>
	        		</tr>
	        		<tr>
	        		<td>
	        			<div class="col-md-8">Author : {!! $blogs->user->name !!}</div>
	        		</td>
	        		</tr>
	        		<tr>
	        		<td>
	        			<div class="col-md-8">Created Date : {!! $blogs->created_at !!}</div>
	        		</td>
	        		</tr>
	        		<tr>
	        		<td>
	        			<div class="col-md-8">Updated Date : {!! $blogs->updated_at !!}</div>
	        		</td>
	        	</tr>
                </table>
            </div>

             <div class="box-header">
	            <h4 class="box-title">Comments about this post</h4>
	        </div>

             <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                   @forelse($comment as $comments)
				        	<tr>
				        		<td>
				        			<div class="col-md-4"><i>{!! $comments->user->name !!}</i> at {!! $comments->created_at !!}</div>
				        			<div class="col-md-8">{!! $comments->content !!}</div>
				        		</td>
				        	</tr>
				        @empty 
				        	<tr>
				        		<td>
				        			No comments for this post
				        		</td>
				        	</tr>
			        	@endforelse
                </table>
            </div>
    </div>     

@stop