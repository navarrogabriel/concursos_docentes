@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Llamado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($llamado, ['route' => ['llamados.update', $llamado->id], 'method' => 'patch']) !!}

                        @include('llamados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection