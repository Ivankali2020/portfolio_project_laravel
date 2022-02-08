<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category')->get();
       return view('Backend.Blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if(!Storage::exists('public/blogPhoto/')){
            Storage::makeDirectory('public/blogPhoto');
        }
        $file = $request->file('photo');
        $newName = uniqid().$file->getClientOriginalName();

        Storage::putFileAs('public/blogPhoto',$file,$newName);

        $blog = new Blog();
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->blog_category_id = $request->category_id;
        $blog->user_id = Auth::id();
        $blog->photo = $newName;
        $blog->slug = Str::slug($request->name);
        $blog->save();
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
       return $blog;
    }

    public function blogShow($slug)
    {
        $blog = Blog::where('slug',$slug)->with('category','user')->first();
        $related = Blog::where('blog_category_id',$blog->blog_category_id)->where('id','!=',$blog->id)->with('category','user')->simplePaginate(3);
        return view('layouts.blogShow',compact('blog','related'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
       return view('Backend.Blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->blog_category_id = $request->category_id;
        if(isset($request->photo)){
            $file = $request->file('photo');
            $newName = uniqid().$file->getClientOriginalName();

            Storage::putFileAs('public/blogPhoto',$file,$newName);
            Storage::delete('public/blogPhoto/'.$blog->photo);
            $blog->photo = $newName;

        }
        $blog->slug = Str::slug($request->name);
        $blog->update();
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully updated']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::delete('public/blogPhoto/'.$blog->photo);
        $blog->delete();
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully delete']);

    }
}
