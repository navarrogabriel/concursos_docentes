<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ordenesmerito->id !!}</p>
</div>

<!-- Id Concurso Field -->
<div class="form-group">
    {!! Form::label('id_concurso', 'Id Concurso:') !!}
    <p>{!! $ordenesmerito->id_concurso !!}</p>
</div>

<!-- Id Postulante Field -->
<div class="form-group">
    {!! Form::label('id_postulante', 'Id Postulante:') !!}
    <p>{!! $ordenesmerito->id_postulante !!}</p>
</div>

<!-- Id Postulante Field -->
<div class="form-group">
    {!! Form::label('orden', 'Orden:') !!}
    <p>{!! $ordenesmerito->orden!!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ordenesmerito->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ordenesmerito->updated_at !!}</p>
</div>
