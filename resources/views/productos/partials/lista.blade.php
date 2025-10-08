<div class="row">
    @forelse($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}"
                         class="card-img-top"
                         alt="{{ $producto->nombre }}">
                @else
                    <img src="https://placehold.co/600x400"
                         class="card-img-top"
                         alt="{{ $producto->nombre }}">
                @endif


                <div class="card-body">
                    <h6 class="card-title">{{ $producto->nombre }}</h6>

                    @if($producto->valoresAtributos && $producto->valoresAtributos->count())
                        <ul class="list-unstyled small text-muted">
                            @foreach($producto->valoresAtributos->take(3) as $valor)
                                <li>{{ $valor->atributo->nombre }}: {{ $valor->valor }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <p class="fw-bold text-success mb-0">S/. {{ number_format($producto->precio, 2) }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted">
            <p>No se encontraron productos para los filtros seleccionados.</p>
        </div>
    @endforelse
</div>
