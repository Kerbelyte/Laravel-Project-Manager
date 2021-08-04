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

    @foreach ($employees as $employee)
        <tr>
            <td style="width:10%">{{ $employee->id }}</td>
            <td style="width:30%">{{ $employee->employee_name}}</td>
            <td style="width:30%"> {{$employee->getProjectNames()}}</td>
            <td style="width:30%">
                <a class="update" href="/employee/{{ $employee->id }}">
                    <i class="far fa-edit"></i>
                </a>
                <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
                    @method('DELETE') @csrf
                    <input class="delete" type="submit" value="DELETE">
                </form>
            </td>
        </tr>
    @endforeach
</table>
<form class="employees-form" action="/employees" method="POST">
    @csrf

    <label class="employee-name" for="name" style="font-size: 16px; color: grey">Add new employee:</label>
    <input style="margin-left: 5px; margin-right: 5%;" type="text" name="employees_name" placeholder="Add employee name">
    <label class="project-name" for="name" style="margin-right: 5px; font-size: 16px; color: grey;">Project name:</label>
    <select name="project_id">
        <option value=0></option>

        @foreach (App\Models\Project::all() as $project) {
            <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
        }
        @endforeach

    </select>
    <input style="margin-left: 10px;" type="submit" name="add_employee" value="Add">
</form>
@endsection