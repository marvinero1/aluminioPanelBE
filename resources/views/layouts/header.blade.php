<!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    {{-- Datos Usuario --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile')}}"><p>Mi Perfil</p></a> 
                    <hr>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
              <li></li>
          @endguest
      </ul>
    </div>
  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
         
            <div class="media">
              {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
         
            <div class="media">
               <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> 
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> 
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @if(Auth::user()->subscripcion != 'false')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/home" class="pt-3">
          <img src="/images/fondos/logo.png" alt="Altools" class="img-circle elevation-2"
              style="display: block;width: 38%;margin: auto;">           
          <span class="brand-text font-weight-light"></span> 
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              @if( Auth::user() == "images/default-person.jpg")
                  <img src="images/system/default-person.jpg" class="img-thumbnail" alt="Usuario" height="75px" width="75px">
              @else
                  <img src="/{{Auth::user()->imagen }}" class="img-thumbnail" alt="Usuario" height="75px" width="75px"
                      style="display: block;margin: 0 auto;">
              @endif         
            </div>
            <div class="info">
              <a href="{{ route('user.index')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              {{-- <li class="nav-item">
                <a href="/categoria" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>Categoria
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li> --}}

              @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
              <li class="nav-item has-treeview">
                <a href="/categoria" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Cortadoras
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 <!--  <li class="nav-item">
                    <a href="/cortadora" class="nav-link ">
                      <i class="far fa fa-scissors nav-icon"></i>
                      <p>Cortadoras Plancha</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="/cortadoraPerfil" class="nav-link ">
                      <i class="far fa fa-scissors nav-icon"></i>
                      <p>Cortadoras Perfil</p>
                    </a>
                  </li>
                </ul>
              </li>
              @endif

              @if(Auth::user()->role == 'admin' )
                <li class="nav-item has-treeview">
                  <a href="/categoria" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                      Categorias
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/categoria" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categoria</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/sub-categoria" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub-Categorias</p>
                      </a>
                    </li>
                  </ul>
                </li>
              @endif
              @if(Auth::user()->role == 'admin' )
              <li class="nav-item">
                <a href="/favoritos" class="nav-link">
                  <i class="nav-icon far fa-star"></i>
                  <p>Mis Favoritos
                    {{-- <span class="badge badge-info right">2</span> --}}
                  </p>
                </a>
              </li>
              @endif
              
            @if(Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="/productos" class="nav-link">
                  <i class="nav-icon far fa fa-archive" aria-hidden="true"></i>
                  <p>Productos
                    {{-- <span class="badge badge-info right">2</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/novedad" class="nav-link">
                    <i class="fa fa-gift nav-icon" aria-hidden="true"></i>
                    <p>Novedades
                      {{-- <span class="badge badge-info right">2</span> --}}
                    </p>
                  </a>
              </li>
              <li class="nav-item has-treeview ">
                <a href="/contacto" class="nav-link">
                  <i class="fa fa-address-book-o nav-icon"></i>
                  <p>Contactos</p>
                </a>
              </li>
            @endif
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'empresa')
              <li class="nav-item">
                <a href="/mis-productos" class="nav-link">
                  <i class="nav-icon far fa fa-archive" aria-hidden="true"></i>
                  <p>Mis Productos
                    {{-- <span class="badge badge-info right">2</span> --}}
                  </p>
                </a>
              </li>
              
              <li class="nav-item has-treeview ">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-id-badge"></i>
                    <p>Cotizaciones
                      <i class="right fas fa-angle-left"></i>
                      {{-- <span class="badge badge-info right">2</span> --}}
                    </p>
                  </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/pedido" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p> Cotizaciones Pendientes</p>
                    </a>
                  </li>
                </ul>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/viewHistorialCotizaciones" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p> Cotizaciones Realizadas</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif

            <!-- ROLE VENDEDOR -->
            @if(Auth::user()->role == 'vendedor')
              <li class="nav-item has-treeview">
                <a href="/categoria" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Cortadoras
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 <!--  <li class="nav-item">
                    <a href="/cortadora" class="nav-link ">
                      <i class="far fa fa-scissors nav-icon"></i>
                      <p>Cortadoras Plancha</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="/cortadoraPerfil" class="nav-link ">
                      <i class="far fa fa-scissors nav-icon"></i>
                      <p>Cortadoras Perfil</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif

            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'vendedor')
              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                  <i class="fa fa-pencil-square-o nav-icon"></i>
                  <p>
                    Registrar
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                 
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/viewRegisEmpresa" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Empresa</p>
                    </a>
                  </li>
                </ul>
            
                

               
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/viewRegisUsuario" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Usuario</p>
                    </a>
                  </li>
                </ul>
              </li>
            
              <li class="nav-item has-treeview ">
                <a class="nav-link">
                  <i class="nav-icon fas fa-id-badge"></i>
                  <p>Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/user" class="nav-link">
                      <i class="nav-icon far fa-user"></i>
                      <p>Usuarios
                        {{-- <span class="badge badge-info right">2</span> --}}
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/importadoras" class="nav-link">
                      <i class="far fa fa-truck nav-icon"></i>
                      <p>Importadoras</p>
                    </a>
                  </li>
                 
                </ul>
              </li>

              
              @endif
              @if(Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="/vendedores" class="nav-link">
                  <i class="far fa-user-circle nav-icon"></i>
                  <p>Vendedores</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/viewRegisVendedor" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Registrar Vendedor</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              @endif
            </ul>
          </nav>
        </div>
    </aside>
@endif