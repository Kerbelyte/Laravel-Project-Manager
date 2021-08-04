@extends('layouts.master')
@section('content')

<form style="justify-content: center; padding: 20px; display: flex" action="{{ route('employees.update', $employee['id']) }}" method="POST">
    @method('PUT') @csrf
    <label style="padding: 12px 12px 12px 0; display: inline-block;" for="name">Employee name:</label>
    <input style="padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: medium;" type="text" id="name" name="name" value="{{ $employee->employee_name}}" placeholder="Employee name">
    <label style="padding: 12px 12px 12px 12px; display: inline-block;" for="name">Project name:</label>
    <select style="padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: medium;" name="project_id">
        <option value=0></option>
        @foreach (App\Models\Project::all() as $project) 
            <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
        
        @endforeach
    </select>
    <input style="background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;float: right; margin-left: 10px;" type="submit" name="update" value="Update">
</form>

<label style="justify-content: center; padding: 20px; display: flex;">Employee projects:
    {{-- {{--

    //    delete employee project logic
    if (!empty($_GET['delete_project_id'])) {
        $employeesManager->deleteProjects($id, $_GET['delete_project_id']);
    } --}}


     @foreach ($employee->projects()->get() as $project) 
        <div style="position: relative; margin-left: 12px; padding: 0px 30px 0px 20px; border: 1px solid lightgrey; border-radius: 5px;"> {{$project->project_name}}
            <a style= "position: absolute; right: 0;padding: 0px; padding-right: 3px;line-height: 9px;color: red; font-size: small;" href="{{ route('employees.deleteProject', ['employeeId' => $employee->id, 'projectId' => $project->id]) }}">
                <i class="fas fa-times"></i>
            </a>
        </div>
    @endforeach
</label>
@endsection
