@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Llamados</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right fa fa-plus-square" data-toggle="tooltip" title ="Crear Nuevo" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('llamados.create') !!}"> Agregar Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('llamados.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
