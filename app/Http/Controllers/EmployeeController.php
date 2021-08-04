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
        // $this->validate($request, [
        //     'employee_name' => 'required|max:50'
        // ]);

        $em = new Employee();
        $em->employee_name = $request['employees_name'];
        if ($em->save()) {
            $em->addProject($request->input('project_id'));
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


}

