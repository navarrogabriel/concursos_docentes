@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requisito Postulante
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('requisito_postulantes.show_fields')
                    <a href="{!! route('requisitoPostulantes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
