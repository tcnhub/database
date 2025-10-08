@extends('layouts.app')
@section('content')

    <div class="container my-5">
        <div class="row">
            {{-- Sidebar de secciones y categorías --}}
            <div class="col-md-3">
                <div class="shadow p-3 bg-white rounded">

                    <hr>

                    <!-- En categorias/show.blade.php, agrega un sidebar de filtros -->
                    <aside>
                        <h3>Filtros por Atributos</h3>
                        @foreach($atributos as $atributo)
                            <b>{{ $atributo->nombre }}</b>
                            <ul>
                                @foreach($atributo->valores as $valor)
                                    <li><a href="{{ route('productos.index', ['filtro' => $atributo->slug . '=' . $valor->valor]) }}">{{ $valor->valor }}</a></li>
                                @endforeach
                            </ul>
                        @endforeach
                    </aside>

                    <aside>
                        <h3>Filtros por Atributos</h3>
                        @foreach($atributos as $atributo)
                            <b>{{ $atributo->nombre }}</b>
                            <ul>
                                @foreach($atributo->valores as $valor)
                                    <li>
                                        <a href="{{ route('productos.index', ['filtro' => $atributo->slug . '=' . $valor->valor,'categoria_id' => $categoria->id]) }}">
                                            {{ $valor->valor }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </aside>


                    <ul>
                        @foreach ($secciones as $sec)
                            <li>
                                <a href="{{ route('secciones.show', $sec) }}">
                                    {{ $sec->nombre }}
                                </a>
                                @foreach ($sec->categorias as $cat)
                                    <ul>
                                        <li>
                                            <a href="{{ route('categorias.show', $cat) }}">
                                                {{ $cat->nombre }}
                                            </a>
                                            @foreach ($cat->children as $subcat)
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('categorias.show', $subcat) }}">
                                                            {{ $subcat->nombre }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>




                    <hr>
                    @include('partials.secciones')
                </div>
            </div>

            {{-- Contenido principal --}}
            <div class="col-md-9">
                <div class="shadow p-3 bg-white rounded">
                    <h1 class="mb-4">Productos en {{ $categoria->nombre }} ({{ $categoria->seccion->nombre }})</h1>
                    <div class="row">
                        @forelse ($productos as $producto)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text text-muted">Slug: {{ $producto->slug }}</p>
                                        <a href="{{ route('productos.show', $producto->slug) }}" class="btn btn-primary btn-sm">
                                            Ver Producto
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                No hay productos en esta categoría.
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
