<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    <p>
       Nombre : {!! $concursoJurado->categoria->nombre!!} <br>
     </p>
</div>

<!-- Concurso Id Field -->
<div class="form-group">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    <p>
       Refencia General : {!! $concursoJurado->concurso->referenciaGeneral !!} <br>
       Asignatura : {!! $concursoJurado->concurso->asignatura->nombre !!} <br>
       Area : {!! $concursoJurado->concurso->asignatura->area->nombre !!} <br>
       Estado del Concurso : {!! $concursoJurado->concurso->estado !!}
    </p>
</div>

<!-- Jurado Id Field -->
<div class="form-group">
    {!! Form::label('jurado_id', 'Jurado:') !!}
    <p>
       Documento :  {!! $concursoJurado->jurado->documento!!} <br>
       Nombre : {!! $concursoJurado->jurado->apellidos!!} <br>
       Apellido :  {!! $concursoJurado->jurado->nombres!!} <br>
     </p>
</div>

<!-- Nivel Field -->
<div class="form-group">
    {!! Form::label('nivel', 'Nivel:') !!}
    <p>{!! $concursoJurado->nivel !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $concursoJurado->tipo !!}</p>
</div>
