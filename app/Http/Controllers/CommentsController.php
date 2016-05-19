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
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $user = $request->user();

        $user->comments()->create([
            'blog_id'=> $request->blogs_id, 
            'content'=> $request->content,
        ]);

        return redirect('blogs/'. $request->blogs_id);

    }

}
