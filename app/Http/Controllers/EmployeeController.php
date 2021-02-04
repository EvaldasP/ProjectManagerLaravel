<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;


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

        $e = new Employee();
        $e->name = $request['name'];
        $e->project_id = $request['project'];

        return ($e->save() !== 1) ?
            redirect('employees')->with('status_success', 'Employee added!') :
            redirect('employees')->with('status_error', 'Employee was not updated!');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employees')->with('status_success', 'Employee deleted!');
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

        $e = Employee::find($id);
        $e->name = $request['name'];

        if ($request['project'] == 'null') {
            $e->project_id = Null;
        } else {
            $e->project_id = $request['project'];
        }

        return ($e->save() !== 1) ?
            redirect('employees')->with('status_success', 'Employee updated!') :
            redirect('employees' . $id)->with('status_error', 'Employee was not updated!');
    }
}
