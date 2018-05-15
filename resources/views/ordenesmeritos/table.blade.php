<table class="table table-responsive" id="ordenesmeritos-table">
    <thead>
        <th>Id Concurso</th>
        <th>Id Postulante</th>
        <th>Orden</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ordenesmeritos as $ordenesmerito)
        <tr>
            <td>{!! $ordenesmerito->concurso->referenciaGeneral !!}</td>
            <td>{!! $ordenesmerito->postulante->documento !!}</td>
            <td>{!! $ordenesmerito->orden !!}</td>
            <td>
                {!! Form::open(['route' => ['ordenesmeritos.destroy', $ordenesmerito->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ordenesmeritos.show', [$ordenesmerito->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ordenesmeritos.edit', [$ordenesmerito->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
