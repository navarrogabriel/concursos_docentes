<table class="table table-responsive" id="jurados-table">
    <thead>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Documento</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Direccion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($jurados as $jurados)
        <tr>
            <td>{!! $jurados->nombres !!}</td>
            <td>{!! $jurados->apellidos !!}</td>
            <td>{!! $jurados->documento !!}</td>
            <td>{!! $jurados->telefono !!}</td>
            <td>{!! $jurados->celular !!}</td>
            <td>{!! $jurados->email !!}</td>
            <td>{!! $jurados->direccion !!}</td>
            <td>
                {!! Form::open(['route' => ['jurados.destroy', $jurados->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jurados.show', [$jurados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jurados.edit', [$jurados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>