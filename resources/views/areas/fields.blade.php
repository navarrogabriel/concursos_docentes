<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Carrera Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('carrera_id', 'Carrera:') !!}
    {!! Form::select('carrera_id', $carreras , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Carrera']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('areas.index') !!}" class="btn btn-default">Cancel</a>
</div>
