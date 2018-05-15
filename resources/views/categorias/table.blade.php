<table class="table table-responsive" id="categorias-table">
    <thead>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($categorias as $categorias)
        <tr>
            <td>{!! $categorias->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['categorias.destroy', $categorias->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categorias.show', [$categorias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categorias.edit', [$categorias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>