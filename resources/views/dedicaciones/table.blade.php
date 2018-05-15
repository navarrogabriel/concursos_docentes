<table class="table table-responsive" id="dedicaciones-table">
    <thead>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($dedicaciones as $dedicaciones)
        <tr>
            <td>{!! $dedicaciones->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['dedicaciones.destroy', $dedicaciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dedicaciones.show', [$dedicaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dedicaciones.edit', [$dedicaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>