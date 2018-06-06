<!-- Asignatura Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignatura_id', 'Asignatura Id:') !!}
    {!! Form::select ('asignatura_id', $asignaturas, null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Asignatura']) !!}
</div>

<!-- Perfil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perfil_id', 'Perfil Id:') !!}
    {!! Form::select('perfil_id', $perfiles , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Perfil']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    {!! Form::select('categoria_id', $categorias , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoria']) !!}
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
    {!! Form::label('cargos', 'Cargos:') !!}
    {!! Form::text('cargos', null, ['class' => 'form-control']) !!}
    </label>
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

<!-- Fechasustanciacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaSustanciacion', 'Fechasustanciacion:') !!}
    {!! Form::date('fechaSustanciacion', null, ['class' => 'form-control']) !!}

</div>

<!-- Usuariosustanciacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuarioSustanciacion', 'Usuariosustanciacion:') !!}
    {!! Form::select('usuarioSustanciacion', $usuarios , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Usuario']) !!}
</div>

<!-- Usuariocierre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuarioCierre', 'Usuariocierre:') !!}
    {!! Form::select('usuarioCierre',$usuarios , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Usuario']) !!}
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

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', $estado , null, ['class' => 'form-control' , 'placeholder'=>'Seleccione Estado del Concurso']) !!}
</div>

<!-- Dedicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dedicacion', 'Dedicacion:') !!}
    {!! Form::select('dedicacion', $dedicaciones , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Dedicacion']) !!}
</div>

<!-- Dictamen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dictamen', 'Dictamen:') !!}
    {!! Form::text('dictamen', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
