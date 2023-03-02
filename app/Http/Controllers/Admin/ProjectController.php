<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', ["project" => new Project(), 'types' => Type::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'required|string|min:10',
            'year_project' => 'required',
            'programming_language' => 'required|string|min:2|max:50',
            // 'type' => 'required|string|min:2|max:50',
            'image' => 'required|image',
            'type_id' => 'required|exists:types,id'
        ]);

        $data['image'] = storage::put('imgs/', $data['image']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project , 'types' => Type::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'required|string|min:10',
            'year_project' => 'required',
            'programming_language' => 'required|string|min:2|max:50',
            // 'type' => 'required|string|min:2|max:50',
            'image' => 'required|image',
            'type_id' => 'required|exists:types, id'
        ]);


        $data = $request->all();
        $newProject = Project::findOrFail($id);
        $newProject->title = $data["title"];
        $newProject->description = $data["description"];
        $newProject->year_project = $data["year_project"];
        // $newProject->thumb = $data["thumb"];
        $newProject->programming_language = $data["programming_language"];
        // $newProject->type = $data["type"];
        $newProject->image = $data['image'];
        $newProject->save();

        return redirect() -> route('admin.projects.show', $newProject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title è stato cancellato con successo")->with('alert-type', 'danger');
    }
}
