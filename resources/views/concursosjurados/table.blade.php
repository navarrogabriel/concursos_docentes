<table class="table table-responsive" id="concursosjurados-table">
    <thead>
        <th>Id Concurso</th>
        <th>Estado</th>
        <th>Id Jurado</th>
        <th>Tipo Jurado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($concursosjurados as $concursosjurados)
        <tr>
            <td>{!! $concursosjurados->concurso->referenciaGeneral!!}</td>
            <td>{!! $concursosjurados->concurso->estado!!}</td>
            <td>{!! $concursosjurados->jurado->documento !!}</td>
            <td>{!! $concursosjurados->tipoJurado !!}</td>
            <td>
                {!! Form::open(['route' => ['concursosjurados.destroy', $concursosjurados->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('concursosjurados.show', [$concursosjurados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('concursosjurados.edit', [$concursosjurados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
