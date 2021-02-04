
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="navWrapper">
    <ul class="navbar-nav">
      <li class="nav-item" >
      <a class="navbar-brand" href="{{'employees'}}">
        <img src="/logoMake.png" width="150" height="105" alt="">
      </a>
      <li>
      <li class="nav-item  {{Request::routeIs('projects') ? 'active' : '' }} ">
        <a class="nav-link primary" href="{{route('projects')}}"><h3>Projects</h3></a>
      </li>
      <li class="nav-item {{ Request::routeIs('employees') ? 'active' : '' }}">
        <a class="nav-link " href="{{route('employees')}}"><h3>Employees</h3></a>
      </li>
    </ul>

    <ul class="navbar-nav">
      @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link " href="{{route('logout')}}"><button type="button" class="btn btn-danger btn-lg">Log Out</button></a>
        </li>
        @else 
        <li class="nav-item">
          <a class="nav-link " href="{{route('login')}}"><button type="button" class="btn btn-info btn-lg">Editor Mode</button></a>
        </li>
      @endif

    </ul>
  </div>
  </nav>
