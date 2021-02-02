<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $projects = Project::all();


        return view('employees', [
            'employees' => $employees,
            'projects' => $projects

        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required'
        ]);

        $pb = new \App\Models\Employee();
        $pb->name = $request['name'];
        $pb->project_id = $request['project'];

        return ($pb->save() !== 1) ?
            redirect('/employees')->with('status_success', 'Employee added!') :
            redirect('/employees')->with('status_error', 'Employee was not updated!');
    }

    public function destroy($id)
    {
        \App\Models\Employee::destroy($id);
        return redirect('/employees')->with('status_success', 'Employee deleted!');
    }

    public function show($id)
    {

        $employee = Employee::find($id);
        $projects = Project::all();

        return view('employeeUpdate', [
            'employee' => $employee,
            'projects' => $projects
        ]);
    }


    public function update($id, Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);



        $bp = Employee::find($id);
        $bp->name = $request['name'];

        if ($request['project'] == 'null') {
            $bp->project_id = Null;
        } else {
            $bp->project_id = $request['project'];
        }




        return ($bp->save() !== 1) ?
            redirect('/employees')->with('status_success', 'Employee updated!') :
            redirect('/employees/' . $id)->with('status_error', 'Employee was not updated!');
    }
}
