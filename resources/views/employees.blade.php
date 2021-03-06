@extends('layouts.app')
@section('content')
    <nav class="container" style="background-color: steelblue; justify-content: center; display: flex;">
        <a style="font-size: 50px; color: #ffffff;" href="/">Manager system</a>
    </nav>
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
                <td style="width:30%">{{ $employee->employee_name }}</td>
                <td style="width:30%"> {{ $employee->getProjectNames() }}</td>
                <td style="width:30%">
                    <a style="padding-right:40px; font-size: x-large; text-decoration: none;" class="update"
                        href="{{ route('employees.update', $employee->id) }}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a style="font-size: x-large; text-decoration: none;"
                        href="{{ route('employees.destroy', $employee['id']) }}">
                        @method('DELETE') @csrf
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    <form class="employees-form" action="/employees" method="POST">
        @csrf
        @error('employees_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label class="employee-name" for="name" style="font-size: 16px; color: grey">Add new employee:</label>
        <input style="margin-left: 5px; margin-right: 5%;" type="text" name="employees_name"
            placeholder="Add employee name">
        <label class="project-name" for="name" style="margin-right: 5px; font-size: 16px; color: grey;">Project
            name:</label>
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
