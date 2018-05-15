@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Concursosjurados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($concursosjurados, ['route' => ['concursosjurados.update', $concursosjurados->id], 'method' => 'patch']) !!}

                        @include('concursosjurados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection