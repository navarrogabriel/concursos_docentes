<!--pre-->
@php
  //var_dump($concurso->users);
@endphp

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $concurso->id !!}</p>
</div>

<!-- Asignatura Id Field -->
<div class="form-group">
    {!! Form::label('asignatura_id', 'Asignatura Id:') !!}
    <p>{!! $concurso->asignatura->nombre !!}</p>
</div>

<!-- Perfil Id Field -->
<div class="form-group">
    {!! Form::label('perfil_id', 'Perfil Id:') !!}
    <p>{!! $concurso->perfile->nombre !!}</p>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    <p>{!! $concurso->categoria->nombre !!}</p>
</div>

<!-- Referenciageneral Field -->
<div class="form-group">
    {!! Form::label('referenciaGeneral', 'Referenciageneral:') !!}
    <p>{!! $concurso->referenciaGeneral !!}</p>
</div>

<!-- Referenciainstituto Field -->
<div class="form-group">
    {!! Form::label('referenciaInstituto', 'Referenciainstituto:') !!}
    <p>{!! $concurso->referenciaInstituto !!}</p>
</div>

<!-- Cargos Field -->
<div class="form-group">
    {!! Form::label('cargos', 'Cargos:') !!}
    <p>{!! $concurso->cargos !!}</p>
</div>

<!-- Lineadesarrollo Field -->
<div class="form-group">
    {!! Form::label('lineaDesarrollo', 'Lineadesarrollo:') !!}
    <p>{!! $concurso->lineaDesarrollo !!}</p>
</div>

<!-- Requisitos Field -->
<div class="form-group">
    {!! Form::label('requisitos', 'Requisitos:') !!}
    <p>{!! $concurso->requisitos !!}</p>
</div>

<!-- Expediente Field -->
<div class="form-group">
    {!! Form::label('expediente', 'Expediente:') !!}
    <p>{!! $concurso->expediente !!}</p>
</div>

<!-- Fechasustanciacion Field -->
<div class="form-group">
    {!! Form::label('fechaSustanciacion', 'Fechasustanciacion:') !!}
    <p>{!! $concurso->fechaSustanciacion !!}</p>
</div>

<!-- Usuariosustanciacion Field -->
<div class="form-group">
    {!! Form::label('usuarioSustanciacion', 'Usuariosustanciacion:') !!}
    <p>{!! $concurso->userSus->name !!}</p>
</div>

<!-- Usuariocierre Field -->
<div class="form-group">
    {!! Form::label('usuarioCierre', 'Usuariocierre:') !!}
    <p>{!! $concurso->userCie->name !!}</p>
</div>

<!-- Observaciones Field -->
<div class="form-group">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    <p>{!! $concurso->observaciones !!}</p>
</div>

<!-- Fechainicio Field -->
<div class="form-group">
    {!! Form::label('fechaInicio', 'Fechainicio:') !!}
    <p>{!! $concurso->fechaInicio !!}</p>
</div>

<!-- Fechafin Field -->
<div class="form-group">
    {!! Form::label('fechaFin', 'Fechafin:') !!}
    <p>{!! $concurso->fechaFin !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $concurso->estado !!}</p>
</div>

<!-- Dedicacion Field -->
<div class="form-group">
    {!! Form::label('dedicacion', 'Dedicacion:') !!}
    <p>{!! $concurso->dedicacion !!}</p>
</div>

<!-- Dictamen Field -->
<div class="form-group">
    {!! Form::label('dictamen', 'Dictamen:') !!}
    <p>{!! $concurso->dictamen !!}</p>
</div>
