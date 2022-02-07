<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::all();
        return view('Backend.Category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectCategoryRequest $request)
    {
        $category = new ProjectCategory();
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('message',['icon'=>'success','text'=>'Successfully Inserted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategory $projectCategory)
    {
        $categories = ProjectCategory::all();
        return view('Backend.Category.edit',compact('projectCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectCategoryRequest  $request
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $projectCategory->name = $request->name;
        $projectCategory->update();
        return redirect()->route('projectCategories.index')->with('message',['icon'=>'success','text'=>'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();
        return redirect()->route('projectCategories.index')->with('message',['icon'=>'success','text'=>'Successfully deleted']);

    }
}
