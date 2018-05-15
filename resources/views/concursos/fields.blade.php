<!-- Id Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_asignatura', 'Seleccione Asignatura:') !!}
    {!! Form::select('id_asignatura', $asignatura, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_categoria', 'Seleccione Categoria:') !!}
    {!! Form::select('id_categoria', $categoria, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Perfil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_perfil', 'Seleccione Perfil:') !!}
    {!! Form::select('id_perfil', $perfil, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Dedicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_dedicacion', 'Seleccione Dedicacion:') !!}
    {!! Form::select('id_dedicacion', $dedicacion, null, ['class' => 'form-control']) !!}
</div>

<!-- Referenciageneral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referenciaGeneral', 'Referenciageneral:') !!}
    {!! Form::text('referenciaGeneral', null, ['class' => 'form-control']) !!}
</div>

<!-- Referenciainstituto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referenciaInstituto', 'Referenciainstituto:') !!}
    {!! Form::text('referenciaInstituto', null, ['class' => 'form-control']) !!}
</div>
<!-- Cargos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargos', 'cargos:') !!}
    {!! Form::text('cargos', null, ['class' => 'form-control']) !!}
</div>

<!-- Lineadesarrollo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lineaDesarrollo', 'Lineadesarrollo:') !!}
    {!! Form::text('lineaDesarrollo', null, ['class' => 'form-control']) !!}
</div>

<!-- Requisitos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requisitos', 'Requisitos:') !!}
    {!! Form::text('requisitos', null, ['class' => 'form-control']) !!}
</div>

<!-- Expediente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expediente', 'Expediente:') !!}
    {!! Form::text('expediente', null, ['class' => 'form-control']) !!}
</div>

<!-- fechaSustanciacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaSustanciacion', 'fechaSustanciacion:') !!}
    {!! Form::date('fechaSustanciacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuariosustanciacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuarioSustanciacion', 'Usuariosustanciacion:') !!}
    {!! Form::text('usuarioSustanciacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Usuariocierre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuarioCierre', 'Usuariocierre:') !!}
    {!! Form::text('usuarioCierre', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechainicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaInicio', 'Fechainicio:') !!}
    {!! Form::date('fechaInicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechafin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaFin', 'Fechafin:') !!}
    {!! Form::date('fechaFin', null, ['class' => 'form-control']) !!}
</div>

<!-- fechaConcurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaConcurso', 'Fecha Concurso:') !!}
    {!! Form::date('fechaConcurso', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado',['Abierto' , 'Cerrado'] ,'', ['class' => 'form-control']) !!} //Modifique el combobox manualmente
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
