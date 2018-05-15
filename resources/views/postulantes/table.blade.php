<table class="table table-responsive" id="postulantes-table">
    <thead>
        <th>Nombres</th>
        <th>Apellido</th>
        <th>Documento</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Direccion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($postulantes as $postulante)
        <tr>
            <td>{!! $postulante->nombres !!}</td>
            <td>{!! $postulante->apellido !!}</td>
            <td>{!! $postulante->documento !!}</td>
            <td>{!! $postulante->telefono !!}</td>
            <td>{!! $postulante->celular !!}</td>
            <td>{!! $postulante->email !!}</td>
            <td>{!! $postulante->direccion !!}</td>
            <td>
                {!! Form::open(['route' => ['postulantes.destroy', $postulante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('postulantes.show', [$postulante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('postulantes.edit', [$postulante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>