

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item {{Request::routeIs('projects') ? 'active' : '' }} ">
        <a class="nav-link " href="/projects">Projects</a>
      </li>
      <li class="nav-item {{ Request::routeIs('employees') ? 'active' : '' }}">
        <a class="nav-link " href="/employees">Employees</a>
      </li>
    </ul>
  </nav>
