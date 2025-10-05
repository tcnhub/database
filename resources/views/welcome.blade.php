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
                @include('partials.secciones')
            </div>

        </div>
        <div class="col-md-9">
            <div class="shadow p-3 my-5 bg-white rounded">
                <div class="lista_de_propductos_dentro_de_una_seccion">
                    Columna General
                </div>
            </div>

        </div>
    </div>





</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
