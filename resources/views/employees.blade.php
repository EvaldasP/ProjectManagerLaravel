@extends('main')

@section('content')

<div id="addFormCont">
<form id="addForm" method="POST" action="/employees">
  @csrf
  <label for="name">Employee Name:</label>
  <input class="form-control  @error('name') required @enderror" type="text" id="name" name="name" plac>
  @error('name')<p class="required">{{$message}}</p>@enderror

  <select class="form-select" name="project">
    <option selected disabled value="">Choose Project:</option>
    @foreach ($projects as $project)
      <option value="{{$project->id}}">{{$project->project_name}}</option>
    @endforeach
  </select>
  <input class="btn btn-outline-primary" type="submit" value="Add">
</form>
</div>


<table class="table table-striped table-light">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Project</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
        $index = 1;
        @endphp
        @foreach ($employees as $employee)
        <tr>
        <td>{{$index}}</td>
        <td>{{$employee['name']}}</td>
        <td>{{$employee->project['project_name']}}</td>

        <td id="actions">
          <form action="{{ route('employee.destroy', $employee['id']) }}" method="POST">
          @method('DELETE') @csrf
          <input class="btn btn-danger" type="submit" value="DELETE">
          </form>

          <form action="{{ route('employee.show', $employee['id']) }}" method="GET">
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
