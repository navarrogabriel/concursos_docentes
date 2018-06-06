<!-- Lllamado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llamado_id', 'Llamado:') !!}
    {!! Form::select('llamado_id', $llamados ,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Llamado']) !!}
</div>
<!-- Concurso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    {!! Form::select('concurso_id', $concursos ,  null, ['class' => 'form-control', 'placeholder' => 'Seleccion Concurso']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('llamadoConcursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
