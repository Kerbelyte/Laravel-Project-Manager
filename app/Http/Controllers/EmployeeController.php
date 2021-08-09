<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees', ['employees' => Employee::all()]);
    }

    public function show($id)
    {
        return view('employeeForm', ['employee' => Employee::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employees_name' => 'required|max:50'
        ]);
        $em = new Employee();
        $em->employee_name = $request['employees_name'];
        if ($em->save()) {
            if($request->input('project_id') != 0) {
                $em->addProject($request->input('project_id'));
            }
            return redirect('/employees')->with('status_success', 'Employee successfully created!');
        } else {
            return redirect('/employees')->with('status_error', 'Failed to create employee!');
        }
    }

    public function destroy($id)
    {
        $em = Employee::find($id);
        $em->removeProjects();
        $em->delete();
        return redirect('/employees')->with('status_success', 'Employee deleted!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);
        $em = Employee::find($id);
        $em->employee_name = $request->input('name');
        if ($em->save()) {
            if($request->input('project_id') != 0) {
                $em->addProject($request->input('project_id'));
            }
            return redirect('/employees')->with('status_success', 'Employee successfully updated!');
        } else {
            return redirect('/employees')->with('status_error', 'Failed to update employee!');
        }
    }
    public function deleteProject($employeeId, $projectId) {
        $pr = Employee::find($employeeId);
        $pr->removeProject($projectId);
        return redirect()->route('employees.show', $employeeId)->with('status_success', 'Project deleted!');
    }
}
