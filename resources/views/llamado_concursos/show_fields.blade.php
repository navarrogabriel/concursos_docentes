<!-- Illamado Id Field -->
<div class="form-group">
    {!! Form::label('llamado_id', 'llamado Id:') !!}
    <p>
      Llamado : {!! $llamadoConcursos->llamado->codigo !!} <br>
      Año : {!! $llamadoConcursos->llamado->año !!}
    </p>
</div>

<!-- Concurso Id Field -->
<div class="form-group">
    {!! Form::label('concurso_id', 'Concurso Id:') !!}
  <p>
    Identificador  : {!! $llamadoConcursos->concurso_id !!} <br>
    Refencia General : {!! $llamadoConcursos->concurso->referenciaGeneral !!} <br>
    Asignatura : {!! $llamadoConcursos->concurso->asignatura->nombre !!} <br>
    Area : {!! $llamadoConcursos->concurso->asignatura->area->nombre !!} <br>
    Estado del Concurso : {!! $llamadoConcursos->concurso->estado !!}
  <p>
</div>
