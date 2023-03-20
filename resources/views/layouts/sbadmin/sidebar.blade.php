<ul class="navbar-nav bg-gradient-{{$background ?? 'primary'}} sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <img width="30" height="30" src="{{asset('img/logo.png')}}" alt="...">
    <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
  </a>

  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fa-solid fa-house"></i>
      <span>Inicio</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fa-solid fa-users"></i> <span>Contactos</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fa-solid fa-comments"></i> <span>Chat</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>