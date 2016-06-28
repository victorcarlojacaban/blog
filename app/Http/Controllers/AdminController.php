<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use DB;
use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $blogsCount = Blog::count();

        $commentsCount = Comment::count();

        $usersCount = User::count();

        return view('admin.index', compact('blogsCount', 'commentsCount', 'usersCount'));
    }
     /**
     * Show list of users.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function users()
    {
        $users = DB::table('users')->paginate(10);

        return view('admin.users', ['users' => $users]);
    }

     /**
     * Show list of users.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function userDetails($name)
    {
        $users = User::showUser($name)->firstOrFail();

        return view('admin.userDetail', compact('users'));
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

        return view('admin.show', compact('blogs', 'comment'));
    }

    /**
     * Show list of blogs.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('admin.blogs', compact('blogs'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */

    public function destroyBlog($id)
    {
        Blog::find($id)->delete();

        flash()->success('Success!', 'Blog successfully removed');

        return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */

    public function destroy($id)
    {
        User::find($id)->delete();
       
        flash()->success('Success!', 'User successfully removed');

        return redirect('admin/users');
    }
}
