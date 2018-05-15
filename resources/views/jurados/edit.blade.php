@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jurados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jurados, ['route' => ['jurados.update', $jurados->id], 'method' => 'patch']) !!}

                        @include('jurados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection