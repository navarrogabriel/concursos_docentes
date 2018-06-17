<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
              @php
              if(empty(Auth::user()->image))
                {
                  $image = "http://digilander.libero.it/Ictszu/rev4.0/avatar.jpg";
                }
              else
                {
                  $image = Auth::user()->image;
                }
              @endphp
                <img src="{{$image}}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>CDUNAJ</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Busqueda..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
            </div>
        </form>
        <!-- Sidebar Menu -->

        <ul class="sidebar-menu">
          @if (Auth::user()->rol == 'Administrador')
              @include('layouts.menu_administrador')
          @elseif (Auth::user()->rol == 'Administrativo')
            @include('layouts.menu_administrativo')
          @else
              @include('layouts.menu_miembro')
          @endif

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
