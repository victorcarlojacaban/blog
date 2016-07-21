<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Blog;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
     /**
     * store newly created resource on storage
     *
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $blog = Blog::find($id);
    
        $this->validate($request, [
            'content' => 'required'
        ]);

        $user = $request->user();

        $user->comments()->create([
            'blog_id' => $blog->id,
            'content'=> $request->content,
        ]);

        return Redirect::back();     
    }
}
