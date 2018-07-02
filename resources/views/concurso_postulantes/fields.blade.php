<!-- Concurso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    {!! Form::select('concurso_id', $concursos  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
</div>

<!-- Postulante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postulante_id', 'Postulante:') !!}
    {!! Form::select('postulante_id', $postulantes , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Postulante']) !!}
</div>

<!-- Fechapresentacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaPresentacion', 'Fecha de Presentacion:') !!}
    {!! Form::date('fechaPresentacion',null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo de Postulante:') !!}
    {!! Form::select('tipo', $tipoPostulantes,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Tipo']) !!}
</div>

<!-- Ordenmerito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordenMerito', 'Orden de Merito:') !!}
    {!! Form::text('ordenMerito',  null, ['class' => 'form-control' ]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursoPostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
