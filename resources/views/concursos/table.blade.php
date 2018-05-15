<table class="table table-responsive" id="concursos-table" style="width:100% ; display: block ; overflow-x: 100% ; white-space: nowrap">
    <thead>
      <tr>
        <th>Asignatura</th>
        <th>Categoria</th>
        <th>Perfil</th>
        <th>Dedicacion</th>
        <th>Referenciageneral</th>
        <th>Referenciainstituto</th>
        <th>Cargos</th>
        <th>Lineadesarrollo</th>
        <th>Requisitos</th>
        <th>Expediente</th>
        <th>fechaSustanciacion</th>
        <th>Usuariosustanciacion</th>
        <th>Usuariocierre</th>
        <th>Observaciones</th>
        <th>Fechainicio</th>
        <th>Fechafin</th>
        <th>Fechaconcurso</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($concursos as $concursos)
        <tr>
            <td>{!! $concursos->asignatura->descripcion !!}</td>
            <td>{!! $concursos->categoria->descripcion !!}</td>
            <td>{!! $concursos->perfil->descripcion !!}</td>
            <td>{!! $concursos->dedicacion->descripcion !!}</td>
            <td>{!! $concursos->referenciaGeneral !!}</td>
            <td>{!! $concursos->referenciaInstituto !!}</td>
            <td>{!! $concursos->cargos !!}</td>
            <td>{!! $concursos->lineaDesarrollo !!}</td>
            <td>{!! $concursos->requisitos !!}</td>
            <td>{!! $concursos->expediente !!}</td>
            <td>{!! $concursos->fechaSustanciacion !!}</td>
            <td>{!! $concursos->usuarioSustanciacion !!}</td>
            <td>{!! $concursos->usuarioCierre !!}</td>
            <td>{!! $concursos->observaciones !!}</td>
            <td>{!! $concursos->fechaInicio !!}</td>
            <td>{!! $concursos->fechaFin !!}</td>
            <td>{!! $concursos->fechaConcurso !!}</td>
            <td>{!! $concursos->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['concursos.destroy', $concursos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('concursos.show', [$concursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('concursos.edit', [$concursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
    <!--tfoot>
      <tr>
        <th>Asignatura</th>
        <th>Categoria</th>
        <th>Perfil</th>
        <th>Dedicacion</th>
        <th>Referenciageneral</th>
        <th>Referenciainstituto</th>
        <th>Cargos</th>
        <th>Lineadesarrollo</th>
        <th>Requisitos</th>
        <th>Expediente</th>
        <th>fechaSustanciacion</th>
        <th>Usuariosustanciacion</th>
        <th>Usuariocierre</th>
        <th>Observaciones</th>
        <th>Fechainicio</th>
        <th>Fechafin</th>
        <th>Fechaconcurso</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
      </tr>
    </tfoot-->
</table>
