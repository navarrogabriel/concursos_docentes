<audio id="clickaudio" src="audio/SD_NAVIGATE_53.mp3" autoplay></audio>
<ul class="sidebar-menu tree" data-widget="tree">
  <li class="header  bg-light-blue text-center">MENU PRINCIPAL : {{Strtoupper(Auth::user()->rol)}}</li>

  <!---------------------------------------------------------------------------------------------------------------------->
    <li class="treeview" >

      <a href="#">
      <i class="fa fa-trophy text-aqua "></i> <span>Gestion de Concursos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('Concurso*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursos.index') !!}"><i class="fa fa-trophy text-light-blue"></i><span>Concursos</span></a>
        </li>

        <li class="{{ Request::is('ConcursoJurado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursoJurados.index') !!}"><i class="glyphicon glyphicon-transfer text-light-blue" ></i><span>Asignar Jurados</span></a>
        </li>
        <li class="{{ Request::is('ConcursoPostulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursoPostulantes.index') !!}"><i class="glyphicon glyphicon-transfer text-light-blue" ></i><span>Asignar Postulantes</span></a>
        </li>
        <li class="{{ Request::is('CargoConcursado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
            <a href="{!! route('cargoConcursados.index') !!}"><i class="fa fa-contao text-light-blue"></i><span>Cargos Concursados</span></a>
        </li>
      </ul>
  </li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview">
  <a href="#">
  <i class="fa fa-legal text-aqua" ></i> <span>Gestion de Jurados</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">

    <li class="{{ Request::is('Jurado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('jurados.index') !!}"><i class="fa fa-legal text-light-blue"></i><span>Jurados</span></a>
    </li>

  </ul>
</li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview">
  <a href="#">
  <i class="fa fa-users text-aqua"></i> <span>Gestion de Postulantes</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Postulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('postulantes.index') !!}"><i class="fa fa-user-plus text-light-blue"></i><span>Postulantes</span></a>
    </li>

  </ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview">
  <a href="#">
  <i class="glyphicon glyphicon-bullhorn text-aqua" ></i> <span>Gestion de Llamados</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Llamado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('llamados.index') !!}"><i class="glyphicon glyphicon-bullhorn text-light-blue"></i><span>Llamados</span></a>
    </li>
    <li class="{{ Request::is('LlamadoConcurso*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('llamadoConcursos.index') !!}"><i class="glyphicon glyphicon-bullhorn text-light-blue"></i><span>Llamados a Concursos</span></a>
    </li>

  </ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview">
  <a href="#">
  <i class="fa fa-folder text-aqua" ></i> <span>Gestion de Requisitos</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Requisito*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitos.index') !!}"><i class="fa fa-file-text text-light-blue"></i><span>Requisitos</span></a>
    </li>
    <li class="{{ Request::is('RequisitoItems*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitoItems.index') !!}"><i class="fa fa-folder-open text-light-blue"></i><span>Requisitos Items</span></a>
    </li>
    <li class="{{ Request::is('RequisitoPostulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitoPostulantes.index') !!}"><i class="fa fa-archive text-light-blue"></i><span>Requisitos Postulantes</span></a>
    </li>
  </ul>
</li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview">
<a href="#">
<i class="glyphicon glyphicon-pencil text-aqua"></i> <span>Gestion de ABM's </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{ Request::is('Area*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('areas.index') !!}"><i class="fa fa-adn text-light-blue"></i><span>Areas</span></a>
  </li>

  <li class="{{ Request::is('Asignatura*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('asignaturas.index') !!}"><i class="fa fa-graduation-cap text-light-blue"></i><span>Asignaturas</span></a>
  </li>

  <li class="{{ Request::is('Carrera*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('carreras.index') !!}"><i class="fa fa-flag-checkered text-light-blue"></i><span>Carreras</span></a>
  </li>

  <li class="{{ Request::is('Categoria*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('categorias.index') !!}"><i class="fa fa-hand-lizard-o text-light-blue"></i><span>Categorias</span></a>
  </li>
  <li class="{{ Request::is('Instituto*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('institutos.index') !!}"><i class="fa fa-institution text-light-blue"></i><span>Institutos</span></a>
  </li>

  <li class="{{ Request::is('Perfiles*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('perfiles.index') !!}"><i class="fa fa-male text-light-blue"></i><span>Perfiles</span></a>
  </li>
  <li class="{{ Request::is('Universidad*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('universidads.index') !!}"><i class="fa fa-university text-light-blue"></i><span>Universidades</span></a>
  </li>

</ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
