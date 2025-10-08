@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div class="shadow p-3 my-5 bg-white rounde  ddd  ">

                    {{-- Lista Anidada de Categorías y Subcategorías --}}
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-4">Categorías en {{ $seccion_individual->nombre }}</h2>
                        @if ($seccion_individual->categorias->isNotEmpty())
                            <ul class="space-y-2 bg-gray-50 p-4 rounded-lg">
                                @foreach ($seccion_individual->categorias->where('categoria_padre_id', null) as $cat) {{-- Solo categorías raíz --}}
                                <li>
                                    <a href="{{ route('categorias.show', $cat) }}"
                                       class="text-blue-600 hover:underline font-medium block py-1">
                                        {{ $cat->nombre }}
                                    </a>
                                    @if ($cat->children->isNotEmpty())
                                        <ul class="ml-6 mt-1 space-y-1 border-l-2 border-gray-300 pl-4">
                                            @foreach ($cat->children as $subcat)
                                                <li>
                                                    <a href="{{ route('categorias.show', $subcat) }}"
                                                       class="text-gray-700 hover:text-blue-600 text-sm block py-1">
                                                        {{ $subcat->nombre }}
                                                    </a>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No hay categorías en esta sección.</p>
                        @endif
                    </div>


                    @include('partials.secciones')
                </div>

            </div>
            <div class="col-md-9">
                <div class="shadow p-3 my-5 bg-white rounded ddd">
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
