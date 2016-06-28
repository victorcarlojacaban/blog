<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * display listing of resource
     *
     * @return Response
     */
    public function home()
    {
        return redirect('blogs');
    }
}
