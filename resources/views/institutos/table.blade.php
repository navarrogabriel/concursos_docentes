<table class="table table-responsive" id="institutos-table">
    <thead>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($institutos as $institutos)
        <tr>
            <td>{!! $institutos->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['institutos.destroy', $institutos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('institutos.show', [$institutos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('institutos.edit', [$institutos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>