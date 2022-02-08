<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('projectCategories')->simplePaginate(5);
        return view('Backend.Project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        if(!Storage::exists('public/projectPhotoOne')){
            Storage::makeDirectory('public/projectPhotoOne');
        }
        if(!Storage::exists('public/projectPhotoMany')){
            Storage::makeDirectory('public/projectPhotoMany');
        }

        $file = $request->file('photo');
        $newName = uniqid().$file->getClientOriginalName();
        Storage::putFileAs('public/projectPhotoOne',$file,$newName);
       $project = new Project();
       $project->name = $request->name;
       $project->client_name = $request->client_name;
       $project->uploaded_at = $request->uploaded_at;
       $project->description = $request->description;
       $project->link = $request->link;
       $project->photo = $newName;
       $project->save();

       $project->projectCategories()->attach($request->categories);

       if(isset($request->photos)){
           $files = $request->file('photos');

           foreach ($files as $f){
               $newNameMany = uniqid().$f->getClientOriginalName();
               Storage::putFileAs('public/projectPhotoMany',$f,$newNameMany);

               DB::table('project_photos')->insert([
                   'name' => $newNameMany,
                   'project_id' => $project->id,
               ]);
           }
       }

        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully inserted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    public function projectShow(Project $id)
    {
        return view('layouts.projectShow',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('Backend.Project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // return $request;
        $project->name = $request->name;
        $project->client_name = $request->client_name;
        $project->uploaded_at = $request->uploaded_at;
        $project->description = $request->description;
        $project->link = $request->link;
        if(isset($request->photo)){
            $request->validate([
            'photo' => 'required|image',
            ]);
            $file = $request->file('photo');
            $newName = uniqid().$file->getClientOriginalName();
            Storage::putFileAs('public/projectPhotoOne',$file,$newName);
            Storage::delete('public/projectPhotoOne/'.$project->photo);
            $project->photo = $newName;

        }
        $project->update();
        $project->projectCategories()->detach();
        $project->projectCategories()->attach($request->categories);
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
