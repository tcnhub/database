@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div class="shadow p-3 my-5 bg-white rounded">

                    <h2 class="text-xl font-bold mb-4">Secciones</h2>
                    <ul class="space-y-2">
                        @foreach ($secciones as $sec)
                            <li>
                                <a href="{{ route('secciones.show', $sec) }}"
                                   class="text-blue-600 hover:underline">
                                    {{ $sec->nombre }}
                                </a>
                                @if ($sec->categorias->isNotEmpty())
                                    <ul class="ml-4 mt-2 space-y-1">
                                        @foreach ($sec->categorias as $cat)
                                            <li>
                                                <a href="{{ route('secciones.show', $cat) }}"
                                                   class="text-gray-700 hover:text-blue-600">
                                                    {{ $cat->nombre }}
                                                </a>
                                                @if ($cat->children->isNotEmpty())
                                                    <ul class="ml-4 mt-1 space-y-1">
                                                        @foreach ($cat->children as $subcat)
                                                            <li>
                                                                <a href="{{ route('secciones.show', $subcat]) }}"
                                                                   class="text-gray-600 hover:text-blue-600 text-sm">
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


                    @include('partials.secciones')
                </div>

            </div>
            <div class="col-md-9">
                <div class="shadow p-3 my-5 bg-white rounded">
                    <p>Listado de productos dentro de una seccion, todos los productos</p>

                    <hr>

                    <div class="lista_de_propductos_dentro_de_una_seccion">
                        <h1>Sección: {{ $seccion_individual->nombre }}</h1>

                        @if($seccion_individual->productos->isEmpty())
                            <p>No hay productos en esta sección.</p>
                        @else
                            <ul>
                                @foreach($seccion_individual->productos as $producto)
                                    <li>
                                        <a href="{{ route('productos.show', $producto) }}">
                                            {{ $producto->nombre }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
