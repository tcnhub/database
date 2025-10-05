<li>
    <a href="{{ $categoria->slug }}">{{ $categoria->nombre }}</a>

    @if ($categoria->children->count())
        <ul>
            @foreach($categoria->children as $child)
                @include('categorias.partials.item', ['categoria' => $child])
            @endforeach
        </ul>
    @endif
</li>
