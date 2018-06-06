@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edición de asignacion de jurado a concurso
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($concursoJurado, ['route' => ['concursoJurados.update', $concursoJurado->id], 'method' => 'patch']) !!}

                        @include('concurso_jurados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
