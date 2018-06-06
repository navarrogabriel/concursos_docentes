<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Registro ID:') !!}
    <p>{!! $asignatura->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $asignatura->nombre !!}</p>
</div>

<!-- Area Id Field -->
<div class="form-group">
    {!! Form::label('area_id', 'Area:') !!}
    <p>{!! $asignatura->area->nombre !!}</p>
</div>
