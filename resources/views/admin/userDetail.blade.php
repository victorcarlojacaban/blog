@extends('layouts.adminLayout')


@section('content')
	 <div class="box">
        <div class="box-header">
            <h3 class="box-title"> <h2>User Details</h2></h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                    	<td>
		        			<div class="col-md-8"><b>Name</b></div>
		        		</td>
		        		<td>
		        			<div class="col-md-8">{!! $users->name !!}</div>
		        		</td>
	        		</tr>
	        		<tr>
	        			<td>
		        			<div class="col-md-8"><b>Email</b></div>
		        		</td>
		        		<td>
		        			<div class="col-md-8">{!! $users->email !!}</div>
		        		</td>
	        		</tr>
	        		<tr>
	        			<td>
		        			<div class="col-md-8"><b>Created Date</b></div>
		        		</td>
		        		<td>
		        			<div class="col-md-8">{!! $users->created_at !!}</div>
		        		</td>
	        		</tr>
	        		<tr>
	        			<td>
		        			<div class="col-md-8"><b>Updated Date</b></div>
		        		</td>
		        		<td>
		        			<div class="col-md-8">{!! $users->updated_at !!}</div>
		        		</td>
	        		</tr>
	        	</tr>
                </table>
            </div>
    </div>     

@stop