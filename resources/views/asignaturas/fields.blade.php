<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_area', 'Seleccion El Area:') !!}
    {!! Form::select('id_area', $areas , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asignaturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
