<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        /* Dropdown estilo mega menu */
        .navbar .dropdown-menu {
            width: 100%;              /* Que ocupe todo el ancho */
            left: 0;                  /* Alinear a la izquierda */
            right: 0;                 /* Alinear a la derecha */
            top: 100%;                /* Justo debajo del navbar */
            border-radius: 0;         /* Opcional: quitar bordes redondeados */
            border: none;             /* Opcional: sin borde */
            padding: 1rem 2rem;       /* Espaciado interno */
        }

        /* Mostrar al hacer hover */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }
        /* Estilo base del dropdown (oculto con opacidad y desplazamiento) */
        .navbar .dropdown-menu {
            display: block;              /* Necesario para controlar animación con opacity */
            visibility: hidden;          /* Oculto al inicio */
            opacity: 0;                  /* Transparente */
            transform: translateY(20px); /* Desplazado hacia abajo */
            transition: all 0.3s ease;   /* Animación suave */
            width: 100%;
            left: 0;
            right: 0;
            top: 100%;
            border-radius: 0;
            border: none;
            padding: 1rem 2rem;
            position: absolute;          /* Asegura que se posicione bien */
        }

        /* Estado visible al hacer hover */
        .nav-item.dropdown:hover .dropdown-menu {
            visibility: visible;
            opacity: 1;
            transform: translateY(0); /* Sube a su lugar */
        }
        .nav-item.dropdown:hover .dropdown-menu {
            width: min-content;
        }

        /* Estilos base para la lista */
        .sidebar_list {
            list-style: none;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
        }

        /* Niveles principales */
        .sidebar_list > li {
            background: #f7f7f7;
            padding: 10px 15px;
            border-bottom: 1px solid #e0e0e0;
            transition: background 0.3s, color 0.3s;
            cursor: pointer;
        }

        .sidebar_list > li:hover {
            background: #e0e0e0;
            color: #333;
        }

        /* Subniveles */
        .sidebar_list li ul {
            list-style: none;
            margin: 0;
            padding: 0; /* 🔹 sin indentación */
            border-left: none; /* 🔹 sin línea lateral */
        }

        .sidebar_list li ul li {
            background: #f0f0f0;
            padding: 8px 15px;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar_list li ul li:hover {
            background: #dcdcdc;
            color: #222;
        }

        /* Tercer nivel */
        .sidebar_list li ul li ul {
            border-left: none;
            padding: 0; /* 🔹 también sin indentación */
        }

        .sidebar_list li ul li ul li {
            background: #e9e9e9;
            padding: 7px 15px;
            font-size: 14px;
        }

        .sidebar_list li ul li ul li:hover {
            background: #cfcfcf;
            color: #111;
        }

        /* Opcional: enlaces dentro de la lista */
        .sidebar_list a {
            text-decoration: none;
            color: inherit;
            display: block;
            width: 100%;
        }




    </style>
</head>
<body>
<div class="container">
    @include('partials.header')
</div>



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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
