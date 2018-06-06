@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edición de asignación de postulantes a concursos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($concursoPostulante, ['route' => ['concursoPostulantes.update', $concursoPostulante->id], 'method' => 'patch']) !!}

                        @include('concurso_postulantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
