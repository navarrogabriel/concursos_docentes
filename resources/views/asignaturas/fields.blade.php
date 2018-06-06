<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area_id', 'Area:') !!}
    {!! Form::select('area_id', $areas , null ,  ['class' => 'form-control' , 'placeholder' => 'Seleccione Asignatura']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asignaturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
