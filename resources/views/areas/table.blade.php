<table class="table table-responsive" id="areas-table" >
    <thead>
        <th>Descripcion</th>
        <th>Instituto Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($areas as $areas)
        <tr>
            <td>{!! $areas->descripcion !!}</td>
            <td>{!! $areas->instituto->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['areas.destroy', $areas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('areas.show', [$areas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('areas.edit', [$areas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
