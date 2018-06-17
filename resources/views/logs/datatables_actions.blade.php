{!! Form::open(['route' => ['logs.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <a href="{{ route('logs.show', $id) }}" data-toggle="tooltip" title ="ver" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
  @if ( Auth::user()->rol == 'Administrador' )
    <a href="{{ route('logs.edit', $id) }}" data-toggle="tooltip" title ="editar" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
      'data-toggle'=>'tooltip',
      'title'=> 'eliminar',
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('¿Está seguro que desea eliminar el registro?')"
    ]) !!}
  @endif
</div>
{!! Form::close() !!}
