<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
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
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Backend.home');
    }


    public function welcome()
    {
        $projects = Project::with('projectCategories')->get();
        $blogs = Blog::with('category')->simplePaginate(3);
//        return $blogs;
        return view('welcome',compact('projects','blogs'));
    }
}
