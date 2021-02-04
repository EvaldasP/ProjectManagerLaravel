@extends('main')
@section('content')

<div id="EditFormCont">
    <div class="logo">
        <img style="width: 100px" src="/employee.svg" alt="">
        <h2>Update Employee</h2>
      </div>
<form id="EditForm" action="{{route('employee.update', $employee['id'])}}" method="POST">
    @method('PUT') @csrf 
    <label for="name">Employee Name:</label>
    <input class="form-control @error('name') required @enderror" type="text" name="name" value="{{ $employee['name'] }}">
    @error('name')<p style="color:red" >{{$message}}</p>@enderror
    <select class="form-select" name="project">
        @if($employee->project['project_name']== null)
            <option selected disabled value="">Choose Project:</option>
            @else 
            <option selected  value="{{$employee->project['id']}}">{{$employee->project['project_name']}}</option>
        @endif
        @foreach ($projects as $project)
            @if($employee->project['id'] == $project['id'])
             @else
                <option value="{{$project->id}}">{{$project->project_name}}</option>
            @endif
        @endforeach
        @if(!$employee->project['project_name']== null)
        <option value="null">---Leave Project</option>
        @endif
      </select>
 
    <input class="btn btn-primary" type="submit" value="UPDATE">
</form>
</div>
 
@endsection