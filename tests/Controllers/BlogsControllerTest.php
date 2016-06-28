<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BlogsControllerTest extends TestCase
{	

	public function __construct()
	{
		/*$this->mock = Mockery::mock();*/
	}

	public function testIndex()
    {
        $this->call('GET', 'blogs');
    	$this->assertViewHas('blogs');
    }

    public function testCreate()
    {
        $this->visit('blogs/create');
    }

    public function testStore()
    {	
    	// Add title to Input to pass validation.
	    Input::replace(array('title' => 'Sample', 'content' => 'sample content'));

	    // Use the mock object to avoid database hitting.

 
	    $this->app->instance('Post', 'blogs');
	

	    $this->call('GET', 'blogs');
	 
	    dd($this->assertViewHas('blogs'));

	    // Pass along input to the store function.
	   /* $this->action('POST', 'blogs.store', null, Input::all());

	    $this->assertRedirectedTo('blogs');*/
    }

}
