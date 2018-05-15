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
<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orden', 'Orden:') !!}
    {!! Form::text('orden' , null  , ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ordenesmeritos.index') !!}" class="btn btn-default">Cancel</a>
</div>
