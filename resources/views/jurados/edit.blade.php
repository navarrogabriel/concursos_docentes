@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jurado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jurado, ['route' => ['jurados.update', $jurado->id], 'method' => 'patch']) !!}

                        @include('jurados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection