<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Registro ID:') !!}
    <p>{!! $area->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $area->nombre !!}</p>
</div>

<!-- Carrera Id Field -->
<div class="form-group">
    {!! Form::label('carrera_id', 'Carrera:') !!}
    <p>{!! $area->carrera->nombre !!}</p>
</div>
