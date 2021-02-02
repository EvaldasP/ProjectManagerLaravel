@extends('main')

@section('content')
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Project</th>
    
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
        </tr>
        @php
        $index++;
        @endphp
        @endforeach
    </tbody>
  </table>
@endsection
