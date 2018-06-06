@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requisito
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requisito, ['route' => ['requisitos.update', $requisito->id], 'method' => 'patch']) !!}

                        @include('requisitos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection