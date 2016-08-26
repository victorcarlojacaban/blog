<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);

        parent::__construct();
    }

    /**
     * display listing of resource
     *
     * @return Response
     */

    public function index()
    {
        $blogs = Blog::latest()->paginate(3);
        
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

    public function show($title)
    {
        $blogs = Blog::showBlog($title)->firstOrFail();
        $comment = $blogs->comments()->get();
        return view('blogs.show', compact('blogs', 'comment'));
    }

     /**
     * show form on editing specified resource
     *
     * @return Response
     */

    public function edit($title, Request $request)
    {
        $blogs = Blog::showBlog($title)->firstOrFail();

        $user = $this->user;
        
        if (!$this->isAuthorized($user, $blogs->user_id)) {

            flash()->error('Sorry!', 'Unknown action');

            return redirect('blogs');
        }
        return view('blogs.edit', compact('blogs'));
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
            'content' => $request->content,
        ];

        $blogs->fill($input)->save();

        flash()->success('Success!', 'Article successfully updated');

        return redirect('blogs/' . $blogs->title);
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
            'content' => $request->content,
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

        return redirect('blogs');
    }

     /**
     * Check if user is authorized to do specified actions
     *
     * @param int currentUser
     * @param int blogUser
     * @return Builder
     */

    private function isAuthorized($currentUser, $blogUser)
    {
        if ($currentUser->isAdmin() || $currentUser->id == $blogUser) {
            return true;
        }

        return false;
    }
}
