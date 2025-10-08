@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">


                <div class="shadow p-3 my-5 bg-white rounded">
                    <p>Sección: {{ $producto->seccion->nombre }}</p>

                    <h3>Categorías relacionadas</h3>
                    <ul class="sidebar_list_diego">
                        @foreach($categorias as $categoria)
                            @include('categorias.partials.item', ['categoria' => $categoria, 'nivel' => 1])
                        @endforeach
                    </ul>
                </div>
                <div class="shadow p-3 my-5 bg-white rounded">
                    esto esta pendiente, mno esta listo para que cuando la persona le haga click seleccione los elementos que estam dispnibnles dentro de ese atributo
                    @foreach($producto->valoresAtributos as $valor)

                        <h6>{{ $valor->atributo->nombre ?? 'Atributo' }}</h6>
                        <label>
                            <input type="checkbox" name="valores[]" value="{{ $valor->id }}">
                            {{ $valor->valor }}
                        </label>

                    @endforeach

                </div>

                <div class="shadow p-3 my-5 bg-white rounded">
                    @include('partials.secciones')
                </div>

            </div>
            <div class="col-md-9">
                <div class="shadow p-3 my-5 bg-white rounded">
                    <div class="atributos ">
                        <h5>Categorias similares a la que pertence este producto</h5>
                        <ul>
                            @foreach ($categorias as $categoria)
                                <li>{{ $categoria->nombre }} ({{ $categoria->slug }})</li>
                            @endforeach
                        </ul>
                        <hr>
                        <h5>Valores Atributos</h5>


                        @if($producto->valoresAtributos->isEmpty())
                            <p>No hay atributos.</p>
                        @else
                            <ul>
                                @foreach($producto->valoresAtributos as $valor)
                                    <li>
                                        {{ $valor->atributo->nombre ?? 'Atributo' }}: <strong>{{ $valor->valor }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="contenido_producto">
                        <h1>{{ $producto->nombre }}</h1>
                        <div><b>Seccion a la que pertenece: </b>{{ $producto->seccion->nombre }}</div>
                        <div><b>Cantidad de Stock:</b> {{ $producto->inventario->stock ?? 'No disponible' }}</div>
                        <div><b>Stock Mínimo:</b> {{ $producto->inventario->stock_minimo ?? 'No disponible' }}</div>
                        <hr>
                        <h5>Caracterictias del Equipo</h5>
                        @if($producto->valoresAtributos->isEmpty())
                            <p>No hay atributos.</p>
                        @else
                            <ul>
                                @foreach($producto->valoresAtributos as $valor)
                                    <li>
                                        {{ $valor->atributo->nombre ?? 'Atributo' }}: <strong>{{ $valor->valor }}</strong>
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
