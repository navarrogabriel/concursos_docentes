<div class="form-group col-sm-6">
    {!! Form::label('id_concurso', 'Seleccione Concurso:') !!}
    {!! Form::select('id_concurso',$concurso, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_jurado', 'Seleccione Jurado:') !!}
    {!! Form::select('id_jurado' ,$jurado, null  , ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('id_jurado', 'Seleccione Jurado Suplente:') !!}
    {!! Form::select('tipoJurado' ,$tipoJurado , null  , ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursosjurados.index') !!}" class="btn btn-default">Cancel</a>
</div>
