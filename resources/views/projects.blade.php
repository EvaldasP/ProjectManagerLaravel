@extends('main')
@section('content')

<div id="addFormCont">
<form id="addForm" method="POST" action="/projects">
  @csrf
  <label for="title">Project Name:</label>
  <input class="form-control  @error('project_name') required @enderror" type="text" id="project_name" name="project_name">
  @error('project_name')<p class="required">{{$message}}</p>@enderror
  <input class="btn btn-outline-primary" type="submit" value="Submit">
</form>
</div>


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
            <form action="{{ route('project.destroy', $project['id']) }}" method="POST">
            @method('DELETE') @csrf
            <input class="btn btn-danger" type="submit" value="DELETE">
            </form>

            <form action="{{ route('project.show', $project['id']) }}" method="GET">
              <input class="btn btn-primary" type="submit" value="UPDATE">
            </form>
          </td>
        
        </tr>
        @php
        $index++;
        @endphp
        @endforeach
    </tbody>
  </table>
@endsection
