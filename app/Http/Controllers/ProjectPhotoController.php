<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectPhotoRequest;
use App\Http\Requests\UpdateProjectPhotoRequest;
use App\Models\ProjectPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProjectPhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectPhotoRequest $request)
    {

        if(isset($request->photos)){

            foreach ($request->file('photos') as $f){
                $file = $f;
                $newNameMany = uniqid().$file->getClientOriginalName();
                Storage::putFileAs('public/projectPhotoMany',$file,$newNameMany);

                DB::table('project_photos')->insert([
                    'name' => $newNameMany,
                    'project_id' => $request->project_id,
                ]);
            }
        }

        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully inserted']);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectPhotoRequest  $request
     * @param  \App\Models\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectPhotoRequest $request, ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectPhoto $projectPhoto)
    {
        $projectPhoto->delete();
        Storage::delete('public/projectPhotoMany/'.$projectPhoto->name);
        return redirect()->back()->with('message',['icon'=>'success','text'=>'successfully inserted']);

    }
}
