<!-- Registro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registro_id', 'Registro Id:') !!}
    {!! Form::number('registro_id', null, ['class' => 'form-control']) !!}
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

<!-- Registrotipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registroTipo', 'Registrotipo:') !!}
    {!! Form::select('registroTipo', $tipoRegistro, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Tipo']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cargoConcursados.index') !!}" class="btn btn-default">Cancel</a>
</div>
