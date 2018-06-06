@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requisito Item
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requisitoItem, ['route' => ['requisitoItems.update', $requisitoItem->id], 'method' => 'patch']) !!}

                        @include('requisito_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection