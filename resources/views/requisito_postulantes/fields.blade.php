<!-- Postulante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postulante_id', 'Postulante Id:') !!}
    {!! Form::number('postulante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Requisitoestado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requisitoEstado', 'Requisitoestado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('requisitoEstado', false) !!}
        {!! Form::checkbox('requisitoEstado', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('requisitoPostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
