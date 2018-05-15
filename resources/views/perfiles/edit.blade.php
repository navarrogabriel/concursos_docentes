@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perfiles
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perfiles, ['route' => ['perfiles.update', $perfiles->id], 'method' => 'patch']) !!}

                        @include('perfiles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection