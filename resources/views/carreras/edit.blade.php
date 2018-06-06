@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Carrera
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($carrera, ['route' => ['carreras.update', $carrera->id], 'method' => 'patch']) !!}

                        @include('carreras.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection