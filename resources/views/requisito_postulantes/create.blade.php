@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requisito Postulante
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'requisitoPostulantes.store']) !!}

                        @include('requisito_postulantes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
