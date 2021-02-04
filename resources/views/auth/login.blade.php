@extends('main')
@section('content')

<div id="loginForm">
      <div class="logo">
        <img style="width: 240px" src="/logoMake.png" alt="">
        <h3>Please Login</h3>
      </div>
     
    <form id="addForm" method="POST" action="{{route('login')}}">
      @if(session('status'))
        <div class="">
          <p style="color:red">{{session('status')}} </p>
        </div>
      @endif
      @csrf
      <label for="name">Name:</label>
      <input class="form-control  @error('name') required @enderror" type="text" id="name" placeholder="admin" name="name">
      @error('name')<p style="color: red">{{$message}}</p>@enderror
      <label for="name">Password:</label>
      <input class="form-control  @error('password') required @enderror" placeholder="admin" type="text" id="password" name="password">
      @error('password')<p style="color: red">{{$message}}</p>@enderror
      <input class="btn btn-outline-primary" type="submit" value="Login">
    </form>
    </div>

@endsection