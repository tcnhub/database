@extends('layouts.app')
@section('content')

    <div class="container my-5">
        <div class="row">
            {{-- Sidebar de secciones y categorías --}}
            <div class="col-md-3">
                <div class="shadow p-3 bg-white rounded">

                    <hr>

                    <h5 class="mb-3 text-primary">Filtrar por atributos</h5>

                    <form id="filtros-form">
                        @csrf
                        <input type="hidden" name="seccion_id" value="{{ $categoria->seccion_id }}">

                        @forelse($atributos as $atributo)
                            <div class="mb-3">
                                <strong>{{ $atributo->nombre }}</strong>
                                <ul class="list-unstyled">
                                    @foreach($atributo->valores as $valor)
                                        <li class="form-check mb-1">
                                            <input
                                                type="checkbox"
                                                name="filtros[{{ $atributo->slug }}][]"
                                                value="{{ $valor->valor }}"
                                                class="form-check-input filtro-checkbox"
                                                id="{{ $atributo->slug }}-{{ $loop->index }}">
                                            <label for="{{ $atributo->slug }}-{{ $loop->index }}" class="form-check-label">
                                                {{ $valor->valor }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @empty
                            <p class="text-muted small">No hay filtros disponibles para esta categoría.</p>
                        @endforelse
                    </form>

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
                <div class="shadow p-3 my-5 bg-white rounded">
                    <h4 class="mb-3">{{ $categoria->nombre }}</h4>

                    <div id="productos-lista">
                        @include('productos.partials.lista', ['productos' => $productos])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.filtro-checkbox').forEach(chk => {
                chk.addEventListener('change', aplicarFiltros);
            });

            function aplicarFiltros() {
                const form = document.getElementById('filtros-form');
                const formData = new FormData(form);

                fetch("{{ route('productos.filtrar') }}", {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('productos-lista').innerHTML = html;
                    })
                    .catch(err => console.error(err));
            }
        });
    </script>
@endsection

