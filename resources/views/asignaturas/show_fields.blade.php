<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $asignatura->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $asignatura->descripcion !!}</p>
</div>

<!-- Id Area Field -->
<div class="form-group">
    {!! Form::label('id_area', 'Id Area:') !!}
    <p>{!! $asignatura->areas->descripcion !!}</p> <!--relacion para mostrar id_area de la tabla Area   -->
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $asignatura->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $asignatura->updated_at !!}</p>
</div>
