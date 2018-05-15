@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Concursospostulantes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($concursospostulantes, ['route' => ['concursospostulantes.update', $concursospostulantes->id], 'method' => 'patch']) !!}

                        @include('concursospostulantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
