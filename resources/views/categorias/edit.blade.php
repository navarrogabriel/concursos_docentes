@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categorias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categorias, ['route' => ['categorias.update', $categorias->id], 'method' => 'patch']) !!}

                        @include('categorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection