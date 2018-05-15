<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $concursosjurados->id !!}</p>
</div>

<!-- Id Concurso Field -->
<div class="form-group">
    {!! Form::label('id_concurso', 'Id Concurso:') !!}
    <p>{!! $concursosjurados->concurso->referenciaGeneral !!}</p>
</div>

<!-- Id Jurado Field -->
<div class="form-group">
    {!! Form::label('id_jurado', 'Id Jurado:') !!}
    <p>{!! $concursosjurados->jurado->documento !!}</p>
</div>

<!-- Id Juradosuplente Field -->
<div class="form-group">
    {!! Form::label('tipoJurado', 'TIpo de Jurado:') !!}
    <p>{!! $concursosjurados->tipoJurado !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $concursosjurados->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $concursosjurados->updated_at !!}</p>
</div>
