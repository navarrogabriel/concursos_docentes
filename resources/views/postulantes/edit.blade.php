@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Postulante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($postulante, ['route' => ['postulantes.update', $postulante->id], 'method' => 'patch']) !!}

                        @include('postulantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection