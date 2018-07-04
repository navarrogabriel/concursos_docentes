<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Concursos Docentes</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{{ asset('../img/favicon.png') }}}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs-rtl.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{!! url('/home') !!}" class="logo">
            <b>CDUNAJ</b>
   
        </a>

        <!-- Header Navbar -->
        <nav  class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div data-intro='Aqui puede ver sus mensajes, tareas  y notificaciones'  class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <!-- Messages: style can be found in dropdown.less-->
                  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 notifications</li>
              <li>
          <!-- inner menu: contains the actual data -->
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li  class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 tasks</li>
            <!-- Tasks: style can be found in dropdown.less -->
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>





                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
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

                            <img src="{{$image}}"
                                 class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{$image}}"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->name !!}
                                    @php $id = Auth::user()->id @endphp
                                    <small>Miembro Desde {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('users.show', $id) }}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar Sesion
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">

  <!-- <button   data-hint="Boton de ayuda" id="boton-consejos"> Consejos </button> -->

  <!-- <button  data-hint="Boton de ayuda" id=""> Ayuda </button> -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ayuda
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="https://get.pxhere.com/photo/wing-line-communication-brand-product-font-decision-illustration-logo-diagram-message-icon-information-news-notice-shape-opening-tips-delivery-support-embassy-info-announcement-topics-of-the-day-proclamation-briefing-clip-art-notification-response-bulletin-rumor-memorandum-day-messages-sign-of-life-919106.jpg" style="width: 100%">
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-primary" data-dismiss="modal" id="boton-ayuda">TUTORIAL INTERACTIVO</button></center>
      </div>
    </div>
  </div>
</div>
  <!-- <button data-intro='example2' data-step="2" data-hint="Boton de ayuda" id="boton-ayuda"> Ayuda </button> -->


        <strong>Copyright © 2018 <a href="#" target="_blank">Alumnos de Ingenieria de Software 2</a>.</strong> All rights reserved.
    </footer>

</div>


<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.js"></script>
 <script>
          $(document).ready(function(){        
           
           
            introJs().refresh()
            
           if (localStorage.getItem("primeringreso") ==  null) {
             	introJs().setOptions({ 
                  	'skipLabel': 'Cerrar',
                    'nextLabel': 'Siguiente',
                    'prevLabel': 'Anterior',
                    'exitOnEsc': 'false',
                    'doneLabel': 'Cerrar',
                    'showButtons': 'false',
                    'exitOnOverlayClick': 'false',
                    'tooltipPosition': 'right',
                    'showStepNumbers' : 'false'
                }).start();
              	localStorage.setItem("primeringreso", "true");                    
           }
           else{}
  		   	
           $('#boton-consejos').click(function(){                       
  				introJs().showHints();
    	   });
           
           $('#boton-ayuda').click(function(){ 
               
            	introJs().setOptions({ 
                  	'skipLabel': 'Cerrar',
                    'nextLabel': 'Siguiente',
                    'prevLabel': 'Anterior',
                    'exitOnEsc': 'false',
                    'doneLabel': 'Cerrar',
                    'showButtons': 'false',
                    'exitOnOverlayClick': 'false',
                    'tooltipPosition': 'right',
                    'showStepNumbers' : 'false'
                }).start();
           });   

          });
</script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

@yield('scripts')
</body>
</html>
