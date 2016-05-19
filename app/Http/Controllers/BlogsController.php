<?php

namespace App\Http\Controllers;


use App\User;
use Session;
use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;

class BlogsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$blogs = Blog::all();

    	return view('blogs.index', compact('blogs'));
    }

    public function create() 
    {
    	return view('blogs.create');
    }


    public function show(Blog $blogs)
	{ 
	   $comment = $blogs->comments()->get();

	   return view('blogs.show', compact(['blogs', 'comment']));	   
	}

	public function edit(Blog $blogs, Request $request)
	{	
		$user = $request->user();

		if ($user && $user->id == $blogs->user_id) 
		{
	    	return view('blogs.edit', compact('blogs'));
		}

		return redirect('blogs');
	}

	public function update(Blog $blogs, Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required',
	        'content' => 'required'
	    ]);

	    $input = $request->all();

	    $blogs->fill($input)->save();

	    Session::flash('flash_message', 'Blog successfully updated!');

	    return redirect('blogs');
	}

    public function store(Request $request)
	{
	    $this->validate($request, [
	        'title' => 'required',
	        'content' => 'required'
	    ]);

	    $user = $request->user();

	    $user->blogs()->create([
	    	'title' => $request->title,
	    	'content' => $request->content,
	    ]);

	  
	    Session::flash('flash_message', 'Blog successfully added!');
	    return redirect('blogs');
	}

	public function destroy(Blog $blogs)
	{
	    $blogs->delete();

	    Session::flash('flash_message', 'Blog successfully deleted!');

	    return redirect('blogs');
	}
}
