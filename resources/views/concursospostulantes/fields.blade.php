@php
  //var_dump($postulante);
@endphp

<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_concurso', 'Seleccione Concurso:') !!}
    {!! Form::select('id_concurso',$concurso, null, ['class' => 'form-control']) !!}
</div>
<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_postulante', 'Seleccione Postulante:') !!}
    {!! Form::select('id_postulante' ,$postulante , null  , ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cumpleRequisitos', 'cumpleRequisitos:') !!}
    {!! Form::select('cumpleRequisitos',$cumpleRequisitos, null, ['class' => 'form-control']) !!}
</div>

<!-- Fechapresentacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaPresentacion', 'Fechapresentacion:') !!}
    {!! Form::date('fechaPresentacion', date("Y-m-d"), ['class' => 'form-control']) !!}
</div>



<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursospostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
