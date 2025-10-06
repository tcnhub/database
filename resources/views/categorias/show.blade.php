@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="shadow p-3 my-5 bg-white rounded">

                    <ul class="list-group list-group-flush">
                        @foreach ($secciones as $sec)
                            <li class="list-group-item">
                                <a href="{{ route('secciones.show', $sec) }}"
                                   class="text-dark {{ $sec->id === $categoria->seccion_id ? 'fw-bold text-primary' : '' }}">
                                    {{ $sec->nombre }}
                                </a>
                                @if ($sec->categorias->isNotEmpty())
                                    <ul class="list-group list-group-flush ms-3 mt-2">
                                        @foreach ($sec->categorias as $cat)
                                            <li class="list-group-item border-0">
                                                <a href="{{ route('categorias.show', $cat) }}"
                                                   class="{{ $cat->id === $categoria->id ? 'text-primary' : 'text-dark' }}">
                                                    {{ $cat->nombre }}
                                                </a>
                                                @if ($cat->children->isNotEmpty())
                                                    <ul class="list-group list-group-flush ms-3">
                                                        @foreach ($cat->children as $subcat)
                                                            <li class="list-group-item border-0">
                                                                <a href="{{ route('categorias.show', $subcat) }}"
                                                                   class="{{ $subcat->id === $categoria->id ? 'text-primary' : 'text-dark' }} small">
                                                                    {{ $subcat->nombre }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <hr>
                    @include('partials.secciones')
                </div>

            </div>
            <div class="col-md-9">
                <div class="shadow p-3 my-5 bg-white rounded">
                    <div class="lista_de_propductos_dentro_de_una_seccion">

                        <h1 class="mb-4">Productos en {{ $categoria->nombre }} ({{ $categoria->seccion->nombre }})</h1>
                        @if ($productos->isNotEmpty())
                            <div class="row">
                                @foreach ($productos as $producto)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                <p class="card-text text-muted">Slug: {{ $producto->slug }}</p>
                                                <a href="{{ route('productos.show', $producto->slug) }}" class="btn btn-primary btn-sm">
                                                    Ver Producto
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                No hay productos en esta categoría.
                            </div>
                        @endif


                        Columna General
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
