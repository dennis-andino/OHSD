<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ Route('dashboard')}}" class="nav-link {{ request()->is('admin') ? ' active':''}}">
                <i class="nav-icon fas fa-home"></i>
              <p>
               Inicio
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
      <li class="nav-item">
        <a href="#" class="nav-link {{ request()->is('admin/posts') ? ' active':''}}">
            <i class="nav-icon fas fa-rss-square"></i>
          <p>Publicaciones<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item ">
            <a href="{{ route('admin.posts.index')}}" class="nav-link">
                <i class="fas fa-blog"></i>
              <p>Ver todas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#editpost" class="nav-link">
                <i class="far fa-file"></i>
              <p>Crear nueva</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
          <p>Gestion de Usuarios<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Categorias</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-shield"></i>
          <p>
           Roles y Permisos
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Permisos</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon  fas fa-book"></i>
          <p>
           Bitacora
            <!--<span class="right badge badge-danger">New</span>-->
          </p>
        </a>
      </li>
    </ul>
</nav>

