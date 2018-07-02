<!-- Requisito item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requisitoitem_id', 'Requisito item:') !!}
    {!! Form::select('requisitoitem_id', $requisitosItems,  null, ['class' => 'form-control', 'placeholder' => '']) !!}
</div>


<!-- Concurso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    {!! Form::select('concurso_id', $concursos  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
</div>

<!-- Postulante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postulante_id', 'Postulante:') !!}
    {!! Form::select('postulante_id', $postulantes , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Postulante']) !!}
</div>



<!-- Etrego requisito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entregoRequisito', 'Entrego requisito:') !!}
    {!! Form::select('entregoRequisito', $entregoRequisito,  null, ['class' => 'form-control', 'placeholder' => '']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('requisitoPostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
