@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="shadow p-3 my-5 bg-white rounded">
                @include('partials.secciones')
            </div>

        </div>
        <div class="col-md-9">
            <div class="shadow p-3 my-5 bg-white rounded">
                <div class="lista_de_propductos_dentro_de_una_seccion">
                    Columna General
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
