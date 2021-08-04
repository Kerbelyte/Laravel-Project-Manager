@extends('layouts.master')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PROJECT</th>
            <th>ACTIONS</th>
        </tr>
    </thead>

    @foreach ($projects as $project)
        <tr>
            <td style="width:10%">{{ $project->id }}</td>
            <td style="width:30%">{{ $project->project_name}}</td>
            <td style="width:30%">{{$project->getEmployeeProjects()}}</td>
            <td style="width:30%">
                <a style="padding-right:40px; font-size: x-large; text-decoration: none;" class="update" href="/project/{{ $project->id }}">
                    <i class="far fa-edit"></i>
                </a>
                <a style="font-size: x-large; text-decoration: none;" href="{{ route('projects.destroy', $project['id']) }}">
                    @method('DELETE') @csrf
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>

<form class="projects-form" action="/projects" method="POST">
    @csrf
    <label for="name" style="font-size: 16px; color: grey;">Add new project:</label>
    <input style="margin-left: 5px; margin-right: 5%;" class="project-name" type="text" id="name" name="project_name" value="" placeholder="Project name">
    <label style="margin-right: 5px; font-size: 16px; color: grey;" class="employee-name" for="name">Employee name:</label>
    <select name="employee_id">
        <option value=0></option>

        @foreach (App\Models\Employee::all() as $employee) {
            <option value="{{ $employee['id'] }}">{{ $employee['employee_name'] }}</option>
        }
        @endforeach

    </select>
    <input style="margin-left: 10px;" type="submit" name="add_project" value="Add">
</form>
@endsection