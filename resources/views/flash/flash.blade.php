@if (session()->has('flash_message'))

	<script>
	    swal({   
	     	title: "{!! session('flash_message.title') !!}",   
	     	text: "{!! session('flash_message.message') !!}",  
	     	type: "{!! session('flash_message.level') !!}",
	     	timer: 2000,   
	     	showConfirmButton: false 
	    });
	</script>

@endif

@if (session()->has('flash_message_overlay'))

	<script>
	     swal({   
	     	title: "{{ session('flash_message_overlay.title') }}",   
	     	text: "{{ session('flash_message_overlay.message') }} ",  
	     	type: "{{ session('flash_message_overlay.level') }}",  
	     	timer: 2000,   
	     	confirmButtonText: 'OK' });
	</script>

@endif

<script>
	$(document).ready(function () {
		$('body').on('click','.btnDelete',function () {
	    	swal({
		        title: "Are you sure to delete this post?",
		        text: "You will not be able to recover this Blog post anymore!",
		        type: "warning",
		        showCancelButton: true,
		        confirmButtonClass: 'btn-danger',
		        confirmButtonText: 'Yes, delete it!',
	        },
		    function(){   
			    $("#deleteForm").submit();
		  	});
	    });
	});
</script>
