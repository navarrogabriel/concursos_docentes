@php
  //var_dump($concursospostulantes);
@endphp

<table class="table table-responsive" id="concursospostulantes-table">
    <thead>
        <th>Id Concurso</th>
        <th>Nombre Postulante</th>
        <th>Apellido Postulante</th>
        <th>Cumple Requisitos</th>
        <th>Fecha Presentacion</th>
        <th>Tipo</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($concursospostulantes as $concursospostulantes)
        <tr>
            <td>{!! $concursospostulantes->concurso->referenciaGeneral !!}</td>
            <td>{!! $concursospostulantes->postulante->nombres !!}</td>
            <td>{!! $concursospostulantes->postulante->apellido !!}</td>
            <td>{!! $concursospostulantes->cumpleRequisitos !!}</td>
            <td>{!! $concursospostulantes->fechaPresentacion !!}</td>
            <td>{!! $concursospostulantes->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['concursospostulantes.destroy', $concursospostulantes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('concursospostulantes.show', [$concursospostulantes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('concursospostulantes.edit', [$concursospostulantes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
