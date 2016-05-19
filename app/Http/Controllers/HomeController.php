<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       /* $this->middleware('auth', ['except' => ['index']]); 
        $this->middleware('auth' ['only' => ['only']]);*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('blogs');
    }
}
