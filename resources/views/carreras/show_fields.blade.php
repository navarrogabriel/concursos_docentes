<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Registro ID:') !!}
    <p>{!! $carrera->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $carrera->nombre !!}</p>
</div>

<!-- Instituto Id Field -->
<div class="form-group">
    {!! Form::label('instituto_id', 'Instituto:') !!}
    <p>{!! $carrera->instituto->nombre !!}</p>
</div>
