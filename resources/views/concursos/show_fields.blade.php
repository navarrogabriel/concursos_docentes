<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $concursos->id !!}</p>
</div>

<!-- Id Asignatura Field -->
<div class="form-group">
    {!! Form::label('id_asignatura', 'Asignatura:') !!}
    <p>{!! $concursos->asignatura->descripcion !!}</p><!--id_asignatura  la cambio por asignatura->descripcion para no mostrar un numero feo -->
</div>

<!-- Id Categoria Field -->
<div class="form-group">
    {!! Form::label('id_categoria', 'Categoria:') !!}
    <p>{!! $concursos->categoria->descripcion !!}</p>
</div>

<!-- Id Perfil Field -->
<div class="form-group">
    {!! Form::label('id_perfil', 'Perfil:') !!}
    <p>{!! $concursos->perfil->descripcion !!}</p>
</div>

<!-- Id Dedicacion Field -->
<div class="form-group">
    {!! Form::label('id_dedicacion', 'Dedicacion:') !!}
    <p>{!! $concursos->dedicacion->descripcion !!}</p>
</div>

<!-- Referenciageneral Field -->
<div class="form-group">
    {!! Form::label('referenciaGeneral', 'Referenciageneral:') !!}
    <p>{!! $concursos->referenciaGeneral !!}</p>
</div>

<!-- Referenciainstituto Field -->
<div class="form-group">
    {!! Form::label('referenciaInstituto', 'Referenciainstituto:') !!}
    <p>{!! $concursos->referenciaInstituto !!}</p>
</div>

<!-- Cargos Field -->
<div class="form-group">
    {!! Form::label('cargos', 'Cargos:') !!}
    <p>{!! $concursos->cargos !!}</p>
</div>

<!-- Lineadesarrollo Field -->
<div class="form-group">
    {!! Form::label('lineaDesarrollo', 'Lineadesarrollo:') !!}
    <p>{!! $concursos->lineaDesarrollo !!}</p>
</div>

<!-- Requisitos Field -->
<div class="form-group">
    {!! Form::label('requisitos', 'Requisitos:') !!}
    <p>{!! $concursos->requisitos !!}</p>
</div>

<!-- Expediente Field -->
<div class="form-group">
    {!! Form::label('expediente', 'Expediente:') !!}
    <p>{!! $concursos->expediente !!}</p>
</div>

<!-- fechaSustanciacion Field -->
<div class="form-group">
    {!! Form::label('fechaSustanciacion', 'fechaSustanciacion:') !!}
    <p>{!! $concursos->fechaSustanciacion !!}</p>
</div>

<!-- Usuariosustanciacion Field -->
<div class="form-group">
    {!! Form::label('usuarioSustanciacion', 'Usuariosustanciacion:') !!}
    <p>{!! $concursos->usuarioSustanciacion !!}</p>
</div>

<!-- Usuariocierre Field -->
<div class="form-group">
    {!! Form::label('usuarioCierre', 'Usuariocierre:') !!}
    <p>{!! $concursos->usuarioCierre !!}</p>
</div>

<!-- Observaciones Field -->
<div class="form-group">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    <p>{!! $concursos->observaciones !!}</p>
</div>

<!-- Fechainicio Field -->
<div class="form-group">
    {!! Form::label('fechaInicio', 'Fechainicio:') !!}
    <p>{!! $concursos->fechaInicio !!}</p>
</div>

<!-- Fechafin Field -->
<div class="form-group">
    {!! Form::label('fechaFin', 'Fechafin:') !!}
    <p>{!! $concursos->fechaFin !!}</p>
</div>

<!-- Fechaconcurso Field -->
<div class="form-group">
    {!! Form::label('fechaConcurso', 'Fechaconcurso:') !!}
    <p>{!! $concursos->fechaConcurso !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $concursos->estado !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $concursos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $concursos->updated_at !!}</p>
</div>
