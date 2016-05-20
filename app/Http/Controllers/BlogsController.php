<?php

namespace App\Http\Controllers;


use App\User;
use Session;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Requests;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * display listing of resource
     *
     * @return Response
     */

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * show form on creating new resource
     *
     * @return Response
     */

    public function create() 
    {   
        return view('blogs.create');
    }

     /**
     * display specified resource
     *
     * @return Response
     */

    public function show(Blog $blogs)
    { 
       $comment = $blogs->comments()->get();

       return view('blogs.show', compact(['blogs', 'comment']));       
    }

     /**
     * show form on editing specified resource
     *
     * @return Response
     */

    public function edit(Blog $blogs, Request $request)
    {   
        $user = $request->user();

        if ($user && $user->id == $blogs->user_id) 
        {
            return view('blogs.edit', compact('blogs'));
        }

        return redirect('blogs');
    }

     /**
     * update specified resource on storage
     *
     * @return Response
     */

    public function update(Blog $blogs, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $input = [
            'title' => $request->title,
            'content' => strip_tags($request->content),
        ];

        $blogs->fill($input)->save();

        flash()->success('Success!', 'Article successfully updated');

        return redirect('blogs');
    }

     /**
     * store newly created resource on storage
     *
     * @return Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $user = $request->user();

        $user->blogs()->create([
            'title' => $request->title,
            'content' => strip_tags($request->content),
        ]);

        flash()->success('Success!', 'Article successfully posted');

        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */

    public function destroy(Blog $blogs)
    {
        $blogs->delete();

        flash()->success('Success!', 'Article successfully removed');

        return back();
    }
}
