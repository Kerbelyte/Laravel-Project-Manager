<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    public function index()
    {
        return view('projects', ['projects' => Project::all()]);
    }

    public function show($id)
    {
        return view('ProjectForm', ['project' => Project::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:projects,project_name|max:50'
        ]);
        $pr = new Project();
        $pr->project_name = $request['project_name'];
        if ($pr->save()) {
            if ($request->input('employee_id') != 0) {
                $pr->addEmployee($request->input('employee_id'));
            }
            return redirect('/projects')->with('status_success', 'Project successfully created!');
        } else {
            return redirect('/projects')->with('status_error', 'Failed to create project!');
        }
    }

    public function destroy($id)
    {
        $pr = Project::find($id);
        $pr->removeEmployees();
        $pr->delete();
        return redirect('/projects')->with('status_success', 'Project deleted!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|max:50'
        ]);
        $pr = Project::find($id);
        $pr->project_name = $request->input('project_name');
        if ($pr->save()) {
            if ($request->input('employee_id') != 0) {
                $pr->addEmployee($request->input('employee_id'));
            }
            return redirect('/projects')->with('status_success', 'Project successfully updated!');
        } else {
            return redirect('/projects')->with('status_error', 'Failed to update project!');
        }
    }

    public function deleteEmployee($projectId, $employeeId) {

        $pr = Project::find($projectId);
        $pr->removeEmployee($employeeId);
        return redirect()->route('projects.show', $projectId)->with('status_success', 'Employee deleted!');
    }

}
