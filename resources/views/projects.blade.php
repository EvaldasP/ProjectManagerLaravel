@extends('main')
@section('content')


<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Project</th>
        <th scope="col">Employees</th>
    
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
        </tr>
        @php
        $index++;
        @endphp
        @endforeach
    </tbody>
  </table>
@endsection
