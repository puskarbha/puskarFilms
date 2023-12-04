<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src='{{asset("assets/dist/img/AdminLTELogo.png")}}' alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Puskar Films</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src='{{asset("assets/dist/img/user2-160x160.jpg")}}' class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Manage Account
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
            <li class="nav-item">


              <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
              <a class="nav-link " href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                <i class="far fa-circle nav-icon"></i>
                Logout
              </a>
            </li>
            <div class="dropdown-divider"></div>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('branches.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Branch
            </p>
          </a>
        </li>
          <li class="nav-item">
              <a href="{{route('movies.index')}}" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                      Movies
                  </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{route('show_times.index')}}" class="nav-link">
                  <i class="fa-regular fa-clock"></i>
                  <p>
                    ShowTime
                  </p>
              </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
