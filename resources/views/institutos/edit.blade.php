@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            institutos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($institutos, ['route' => ['institutos.update', $institutos->id], 'method' => 'patch']) !!}

                        @include('institutos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection