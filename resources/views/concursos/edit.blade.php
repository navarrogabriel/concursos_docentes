@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Concurso
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($concurso, ['route' => ['concursos.update', $concurso->id], 'method' => 'patch']) !!}

                        @include('concursos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection