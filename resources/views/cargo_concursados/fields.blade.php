<!-- Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persona_id', 'Persona:') !!}
    {!! Form::select('persona_id', $personas ,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione persona']) !!}
</div>

<!-- Universidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('universidad_id', 'Universidad Id:') !!}
    {!! Form::select('universidad_id', $universidades ,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Universidad']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    {!! Form::select('categoria_id', $categorias ,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Categoria']) !!}
</div>

<!-- Dedicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dedicacion', 'Dedicacion:') !!}
    {!! Form::select('dedicacion', $dedicaciones,  null, ['class' => 'form-control', 'placeholder' => 'Seleccione Dedicacion']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cargoConcursados.index') !!}" class="btn btn-default">Cancel</a>
</div>
