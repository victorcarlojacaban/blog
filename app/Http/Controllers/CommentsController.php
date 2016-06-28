<?php

namespace App\Http\Controllers;

use DB;
use App\Comment;
use App\Blog;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
     /**
     * store newly created resource on storage
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $blog = Blog::where('id', $request->blogs_id)->first();

        $this->validate($request, [
            'content' => 'required'
        ]);

        $user = $request->user();

        $user->comments()->create([
            'blog_id'=> $blog->id, 
            'content'=> $request->content,
        ]);

        return redirect('blogs/'. $blog->title);
    }
}
