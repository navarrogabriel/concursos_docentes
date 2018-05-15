<table class="table table-responsive" id="asignaturas-table">
    <thead>
        <th>Descripcion</th>
        <th>Area</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($asignaturas as $asignatura)
        <tr>
            <td>{!! $asignatura->descripcion !!}</td>
            <td>{!! $asignatura->areas->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['asignaturas.destroy', $asignatura->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asignaturas.show', [$asignatura->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asignaturas.edit', [$asignatura->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
