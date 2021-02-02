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

            'project_name' => 'required'
        ]);

        $pb = new \App\Models\Project();
        $pb->project_name = $request['project_name'];
        return ($pb->save() == 1) ? back() : "NOT OK";
    }


    public function destroy($id)
    {
        \App\Models\Project::destroy($id);
        return redirect('/projects')->with('status_success', 'Post deleted!');
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
            'project_name' => 'required'
        ]);



        $bp = project::find($id);
        $bp->project_name = $request['project_name'];

        return ($bp->save() !== 1) ?
            redirect('/projects/' . $id)->with('status_success', 'Post updated!') :
            redirect('/projects/' . $id)->with('status_error', 'Post was not updated!');
    }
}
