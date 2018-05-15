<table class="table table-responsive" id="perfiles-table">
    <thead>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($perfiles as $perfiles)
        <tr>
            <td>{!! $perfiles->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['perfiles.destroy', $perfiles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perfiles.show', [$perfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perfiles.edit', [$perfiles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>