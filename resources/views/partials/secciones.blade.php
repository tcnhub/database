@foreach($secciones as $seccion)
    <h2><a href="{{ route('secciones.show', $seccion) }}">{{ $seccion->nombre }}</a></h2>
    @if ($seccion->categorias->count() > 0)
        <ul>
            @foreach($seccion->categorias as $categoria)
                @include('partials.categoria', ['categoria' => $categoria])
            @endforeach
        </ul>
    @else
        <p>No hay categorías en esta sección.</p>
    @endif
@endforeach
