<li class="{{ Request::is('postulantes*') ? 'active' : '' }}">
    <a href="{!! route('postulantes.index') !!}"><i class="fa fa-user-plus"></i><span> Postulantes</span></a>
</li>

<li class="{{ Request::is('areas*') ? 'active' : '' }}">
    <a href="{!! route('areas.index') !!}"><i class="fa fa-adn"></i><span> Areas</span></a>
</li>

<li class="{{ Request::is('institutos*') ? 'active' : '' }}">
    <a href="{!! route('institutos.index') !!}"><i class="fa fa-institution"></i><span> Institutos</span></a>
</li>

<li class="{{ Request::is('asignaturas*') ? 'active' : '' }}">
    <a href="{!! route('asignaturas.index') !!}"><i class="fa fa-graduation-cap"></i><span> Asignaturas</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-hand-lizard-o"></i><span> Categorias</span></a>
</li>

<li class="{{ Request::is('dedicaciones*') ? 'active' : '' }}">
    <a href="{!! route('dedicaciones.index') !!}"><i class="fa fa-heart"></i><span> Dedicaciones</span></a>
</li>

<li class="{{ Request::is('jurados*') ? 'active' : '' }}">
    <a href="{!! route('jurados.index') !!}"><i class="fa fa-legal "></i><span> Jurados</span></a>
</li>

<li class="{{ Request::is('perfiles*') ? 'active' : '' }}">
    <a href="{!! route('perfiles.index') !!}"><i class="fa fa-users"></i><span> Perfiles</span></a>
</li>

<li class="{{ Request::is('concursos*') ? 'active' : '' }}">
    <a href="{!! route('concursos.index') !!}"><i class="fa fa-table"></i><span> Concursos</span></a>
</li>
<li class="{{ Request::is('Concursos Postulantes*') ? 'active' : '' }}">
    <a href="{!! route('concursospostulantes.index') !!}"><i class="fa fa-exchange"></i><span>Asignar Postulantes</span></a>
</li>
<li class="{{ Request::is('Concursos Jurados*') ? 'active' : '' }}">
    <a href="{!! route('concursosjurados.index') !!}"><i class="fa fa-exchange"></i><span>Asignar Jurados</span></a>
</li>
<li class="{{ Request::is('ordenesmeritos*') ? 'active' : '' }}">
    <a href="{!! route('ordenesmeritos.index') !!}"><i class="fa fa-edit"></i><span>Orden de Meritos</span></a>
</li>
