
@foreach($children as $child)
    @if ($level == 1)
        <a href="{{ route('categorias.show', $child) }}" class="list-group-item list-group-item-action">
            {{ $child->nombre }}
        </a>
    @else
        <li>
            <a href="{{ route('categorias.show', $categoria) }}">{{ $child->nombre }}</a>
        </li>
    @endif
    @if (optional($child->children)->count() > 0)
        <ul>
            @include('partials.categoria_recursive', ['children' => $child->children, 'level' => $level + 1])
        </ul>
    @endif
@endforeach
