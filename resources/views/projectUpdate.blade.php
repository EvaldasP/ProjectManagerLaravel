@extends('main')

@section('content')

<div id="EditFormCont">
    <h2>Update Project</h2>

<form id="EditForm" action="{{{route('project.update', $project['id'])}}}" method="POST">
    @method('PUT') @csrf 
    <label  for="project_name">Project Name:</label>
    <input class="form-control @error('project_name') required @enderror" type="text" name="project_name" value="{{ $project['project_name'] }}">
    @error('project_name')<p style="color:red" >{{$message}}</p>@enderror
    <input class="btn btn-primary" type="submit" value="UPDATE">
</form>
</div>
@endsection