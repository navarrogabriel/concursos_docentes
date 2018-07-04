<audio id="clickaudio" src="audio/SD_NAVIGATE_53.mp3" autoplay></audio>
<ul class="sidebar-menu tree" data-widget="tree">
  <li class="header  bg-red text-center">MENU PRINCIPAL : {{Strtoupper(Auth::user()->rol)}}</li>

  <!---------------------------------------------------------------------------------------------------------------------->
    <li class="treeview"  data-intro='En esta sección va a poder gestionar sus concursos, tanto la asignación de jurados,postulantes como los cargos que se van a concursar según corresponda'>

      <a href="#">
      <i class="fa fa-trophy text-red"></i> <span>Gestion de Concursos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('Concurso*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursos.index') !!}"><i class="fa fa-trophy text-red"></i><span>Concursos</span></a>
        </li>

        <li class="{{ Request::is('ConcursoJurado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursoJurados.index') !!}"><i class="glyphicon glyphicon-transfer text-red" ></i><span>Asignar Jurados</span></a>
        </li>
        <li class="{{ Request::is('ConcursoPostulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
          <a href="{!! route('concursoPostulantes.index') !!}"><i class="glyphicon glyphicon-transfer text-red" ></i><span>Asignar Postulantes</span></a>
        </li>
        <li class="{{ Request::is('CargoConcursado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
            <a href="{!! route('cargoConcursados.index') !!}"><i class="fa fa-contao text-red"></i><span>Cargos Concursados</span></a>
        </li>
      </ul>
  </li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview" data-intro='En esta sección va a poder gestionar los jurados, podra agregar, eliminar y modificar jurados para luego utilizarlos en los concursos'>
  <a href="#">
  <i class="fa fa-legal text-red" ></i> <span>Gestion de Jurados</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">

    <li class="{{ Request::is('Jurado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('jurados.index') !!}"><i class="fa fa-legal text-red"></i><span>Jurados</span></a>
    </li>

  </ul>
</li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview"  data-intro='En esta sección va a poder gestionar los postulantes, podra agregar, eliminar y modificar los datos en el sistema'>
  <a href="#">
  <i class="fa fa-users text-red"></i> <span>Gestion de Postulantes</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Postulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('postulantes.index') !!}"><i class="fa fa-user-plus text-red"></i><span>Postulantes</span></a>
    </li>

  </ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview" data-intro='En esta sección va a poder gestionar los llamados que se van a realizar por concurso'>
  <a href="#">
  <i class="glyphicon glyphicon-bullhorn text-red" ></i> <span>Gestion de Llamados</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Llamado*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('llamados.index') !!}"><i class="glyphicon glyphicon-bullhorn text-red"></i><span>Llamados</span></a>
    </li>
    <li class="{{ Request::is('LlamadoConcurso*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('llamadoConcursos.index') !!}"><i class="glyphicon glyphicon-bullhorn text-red"></i><span>Llamados a Concursos</span></a>
    </li>

  </ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview" data-intro='En esta sección va a poder gestionar los requisitos, es una sección obligatoria para que un concurso tenga correctamente cargados los requisitos para el llamado'>
  <a href="#">
  <i class="fa fa-folder text-red" ></i> <span>Gestion de Requisitos</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('Requisito*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitos.index') !!}"><i class="fa fa-file-text text-red"></i><span>Requisitos</span></a>
    </li>
    <li class="{{ Request::is('RequisitoItems*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitoItems.index') !!}"><i class="fa fa-folder-open text-red"></i><span>Requisitos Items</span></a>
    </li>
    <li class="{{ Request::is('RequisitoPostulante*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('requisitoPostulantes.index') !!}"><i class="fa fa-archive text-red"></i><span>Requisitos Postulantes</span></a>
    </li>
  </ul>
</li>

<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview" data-intro='En esta sección va a poder gestionar los toda la información necesaria para el funcionamiento del sistema, cada item es necesario para poder generar un concurso, o un jurado (Ej. La universidad donde se realiza el concurso)'>
<a href="#">
<i class="glyphicon glyphicon-pencil text-red"></i> <span>Gestion de ABM's </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{ Request::is('Area*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('areas.index') !!}"><i class="fa fa-adn text-red"></i><span>Areas</span></a>
  </li>

  <li class="{{ Request::is('Asignatura*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('asignaturas.index') !!}"><i class="fa fa-graduation-cap text-red"></i><span>Asignaturas</span></a>
  </li>

  <li class="{{ Request::is('Carrera*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('carreras.index') !!}"><i class="fa fa-flag-checkered text-red"></i><span>Carreras</span></a>
  </li>

  <li class="{{ Request::is('Categoria*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('categorias.index') !!}"><i class="fa fa-hand-lizard-o text-red"></i><span>Categorias</span></a>
  </li>
  <li class="{{ Request::is('Instituto*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('institutos.index') !!}"><i class="fa fa-institution text-red"></i><span>Institutos</span></a>
  </li>

  <li class="{{ Request::is('Perfiles*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('perfiles.index') !!}"><i class="fa fa-male text-red"></i><span>Perfiles</span></a>
  </li>
  <li class="{{ Request::is('Universidad*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
      <a href="{!! route('universidads.index') !!}"><i class="fa fa-university text-red"></i><span>Universidades</span></a>
  </li>

</ul>
</li>
<!---------------------------------------------------------------------------------------------------------------------->
<li class="treeview" data-intro='Función netamente administrativa, podra gestionar todos los usuarios del sistema.'>
  <a href="#">
  <i class="fa fa-user text-red " ></i> <span>Gestion de Usuarios</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('log*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('logs.index') !!}"><i class="fa fa-history text-red"></i><span>Logs</span></a>
    </li>
    <li class="{{ Request::is('User*') ? 'active' : '' }}" Onclick="play(this,'clickaudio')">
        <a href="{!! route('users.index') !!}"><i class="fa fa-user text-red"></i><span>Usuarios</span></a>
    </li>

  </ul>
</li>

</li>
</ul>
