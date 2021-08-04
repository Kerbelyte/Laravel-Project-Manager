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
        // $this->validate($request, [
        //     'project_name' => 'required|unique:projects,project_name|max:30'
        // ]);

        $pr = new Project();
        $pr->project_name = $request['project_name'];
        if($pr->save()){
            $pr->addEmployee($request->input('employee_id'));
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
}
