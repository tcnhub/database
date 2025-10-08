@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- ========================= --}}
            {{-- 🔹 SIDEBAR DE FILTROS --}}
            {{-- ========================= --}}
            <div class="col-md-3">
                <div class="shadow p-3 my-5 bg-white rounded">
                    <h5 class="mb-3 text-primary">Filtros por Atributos</h5>

                    <form id="filtros-form">
                        @csrf

                        <div class="accordion" id="accordionSecciones">
                            @foreach($secciones as $i => $seccion)
                                <div class="accordion-item mb-3 border-0">
                                    <h2 class="accordion-header" id="headingSec{{ $i }}">
                                        <button
                                            class="accordion-button collapsed fw-bold bg-light text-dark"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseSec{{ $i }}"
                                            aria-expanded="false"
                                            aria-controls="collapseSec{{ $i }}">
                                            {{ $seccion->nombre }}
                                        </button>
                                    </h2>

                                    <div
                                        id="collapseSec{{ $i }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="headingSec{{ $i }}"
                                        data-bs-parent="#accordionSecciones">
                                        <div class="accordion-body py-2">

                                            {{-- 🔹 Atributos dentro de la sección --}}
                                            @forelse($seccion->atributos as $atributo)
                                                <div class="mb-3">
                                                    <strong class="d-block mb-1">{{ $atributo->nombre }}</strong>
                                                    <ul class="list-unstyled">
                                                        @foreach($atributo->valores as $valor)
                                                            <li class="form-check mb-1">
                                                                <input
                                                                    type="checkbox"
                                                                    name="filtros[{{ $atributo->slug }}][]"
                                                                    value="{{ $valor->valor }}"
                                                                    class="form-check-input filtro-checkbox"
                                                                    id="{{ $atributo->slug }}-{{ $loop->index }}">
                                                                <label
                                                                    for="{{ $atributo->slug }}-{{ $loop->index }}"
                                                                    class="form-check-label">
                                                                    {{ $valor->valor }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @empty
                                                <p class="text-muted small mb-0">No hay atributos en esta sección.</p>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>

                <div class="shadow p-3 my-4 bg-white rounded">
                    @include('partials.secciones')
                </div>
            </div>

            {{-- ========================= --}}
            {{-- 🔹 LISTADO DE PRODUCTOS --}}
            {{-- ========================= --}}
            <div class="col-md-9">
                <div class="shadow p-3 my-5 bg-white rounded">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Productos</h4>
                        <button type="button" id="limpiar-filtros" class="btn btn-sm btn-outline-secondary">Limpiar filtros</button>
                    </div>

                    <div id="productos-lista">
                        {{-- Aquí se carga dinámicamente el listado vía AJAX --}}
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

            // 🔹 Detectar cambios en los checkboxes
            document.querySelectorAll('.filtro-checkbox').forEach(chk => {
                chk.addEventListener('change', aplicarFiltros);
            });

            // 🔹 Botón limpiar filtros
            document.getElementById('limpiar-filtros').addEventListener('click', function() {
                document.querySelectorAll('.filtro-checkbox').forEach(chk => chk.checked = false);
                aplicarFiltros();
            });

            // 🔹 Enviar filtros por AJAX
            function aplicarFiltros() {
                const form = document.getElementById('filtros-form');
                const formData = new FormData(form);

                fetch("{{ route('productos.filtrar') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
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
