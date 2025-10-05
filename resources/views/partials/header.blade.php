<div class="navbar navbar-expand-lg bg-body-tertiary p-0 shadow border" id="navbarExample1">
    <ul class="navbar-nav me-auto ps-lg-0">
        @foreach($secciones as $seccion)
            <li class="nav-item dropdown position-static">
                <a data-mdb-dropdown-init class="nav-link dropdown-toggle p-3" href="#" id="seccion_{{ $seccion->id }}" role="button"
                   data-mdb-toggle="dropdown" aria-expanded="false">
                    {{ $seccion->nombre }}
                </a>
                <div class="dropdown-menu shadow w-100 mt-0" aria-labelledby="seccion_{{ $seccion->id }}" style="border-top-left-radius:0; border-top-right-radius:0;">
                    <div class="container">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    @if ($seccion->categorias->count() > 0)
                                        @foreach($seccion->categorias as $categoria)
                                            <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                <h4><a href="{{ route('categorias.show', $categoria) }}">{{ $categoria->nombre }}</a></h4>
                                                <div class="list-group list-group-flush">
                                                    @if (optional($categoria->children)->count() > 0)
                                                        @include('partials.categoria_recursive', ['children' => $categoria->children, 'level' => 1])
                                                    @else
                                                        <p>No hay categorías hijas en esta categoría.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12">
                                            <p>No hay categorías en esta sección.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

