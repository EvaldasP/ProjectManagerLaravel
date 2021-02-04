@extends('main')
@section('content')

@if(Auth::check())
<div id="addFormCont">
<form id="addForm" method="POST" action="/projects">
  @csrf
  <label for="title">Project Name:</label>
  <input class="form-control  @error('project_name') required @enderror" type="text" id="project_name" name="project_name">
  @error('project_name')<p style="color: red">{{$message}}</p>@enderror
  <input class="btn btn-outline-primary" type="submit" value="Add">
</form>
</div>
@endif

@if(session()->has('status_success'))
  @if(str_contains(session()->get('status_success'), 'added'))
    <div class="alert alert-success">
    @elseif(str_contains(session()->get('status_success'), 'updated'))
    <div class="alert alert-warning">
    @else
    <div class="alert alert-primary">
  @endif
    {{ session()->get('status_success') }}
</div>
@endif

<table class="table table-striped light-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Project</th>
        <th scope="col">Employees</th>
        <th scope="col">Actions</th>
    
      </tr>
    </thead>
    <tbody>
        @php
       $index = 1;
        @endphp
        @foreach ($projects as $project)
        <tr>
        <td>{{$index}}</td>
        <td>{{$project['project_name']}}</td>
        <td>
          @foreach ($project->employees as $employee)
          {{ $loop->first ? '' :', ' }}
          {{$employee['name']}}
          @endforeach
        </td>
          <td id="actions">
            @if(Auth::check())
            <form action="{{ route('project.destroy', $project['id']) }}" method="POST">
            @method('DELETE') @csrf
            <input class="btn btn-danger" type="submit" value="DELETE">
            </form>

            <form action="{{ route('project.show', $project['id']) }}" method="GET">
              <input class="btn btn-primary" type="submit" value="UPDATE">
            </form>
            @endif
          </td>
        </tr>
        @php
        $index++;
        @endphp
        @endforeach
    </tbody>
  </table>
@endsection
