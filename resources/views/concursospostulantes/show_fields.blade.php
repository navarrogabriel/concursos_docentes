<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $concursospostulantes->id !!}</p>
</div>

<!-- Id Concurso Field -->
<div class="form-group">
  <a href="{!! route('concursos.show', [$concursospostulantes->id_concurso]) !!}">{!! Form::label('id_concurso', 'Id Concurso:') !!}</a>
    <p>{!! $concursospostulantes->concurso->referenciaGeneral !!}</p>
</div>

<!-- Id Postulante Field -->
<div class="form-group">
    <a href="{!! route('postulantes.show', [$concursospostulantes->id_postulante]) !!}">{!! Form::label('id_postulante', 'Postulante:') !!}</a>
    <p>identificador : {!! $concursospostulantes->id_postulante !!}</p>
    <p>Documento : {!! $concursospostulantes->postulante->documento !!}</p>
    <p>Nombres :{!! $concursospostulantes->postulante->nombres !!}</p>
    <p>Apellido :{!! $concursospostulantes->postulante->apellido !!}</p>
    </p>
</div>

<!-- Cumplerequisitos Field -->
<div class="form-group">
    {!! Form::label('cumpleRequisitos', 'Cumple Requisitos:') !!}
    <p>{!! $concursospostulantes->cumpleRequisitos !!}</p>
</div>

<!-- Fechapresentacion Field -->
<div class="form-group">
    {!! Form::label('fechaPresentacion', 'Fecha Presentacion:') !!}
    <p>{!! $concursospostulantes->fechaPresentacion !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $concursospostulantes->tipo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $concursospostulantes->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $concursospostulantes->updated_at !!}</p>
</div>
