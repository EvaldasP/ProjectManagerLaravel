<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()

    {
        $projects = Project::all();
        return view('projects', [
            'projects' => $projects,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'project_name' => 'required|unique:projects'
        ]);

        $pb = new Project();
        $pb->project_name = $request['project_name'];

        return ($pb->save() !== 1) ?
            redirect('/projects')->with('status_success', 'Project added!') :
            redirect('/projects')->with('status_error', 'Project was not updated!');
    }



    public function destroy($id)
    {
        Project::destroy($id);
        return redirect('/projects')->with('status_success', 'Project deleted!');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('projectUpdate', [
            'project' => $project
        ]);
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'project_name' => 'required|unique:projects'
        ]);
        $bp = project::find($id);
        $bp->project_name = $request['project_name'];

        return ($bp->save() !== 1) ?
            redirect('/projects')->with('status_success', 'Project updated!') :
            redirect('/projects/' . $id)->with('status_error', 'Project was not updated!');
    }
}
