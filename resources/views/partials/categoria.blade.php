<li>
    {{ $categoria->nombre }}
    @if($categoria->children->count())
        <ul>
            @foreach($categoria->children as $child)
                @include('partials.categoria', ['categoria' => $child])
            @endforeach
        </ul>
    @endif
</li>
