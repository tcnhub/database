<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>

        /* Estado inicial del menú: invisible y ligeramente desplazado hacia abajo */
        .dropdown-menu {
            opacity: 0;
            visibility: hidden; /* Oculto para que no se pueda hacer clic en él */
            transform: translateY(10px); /* Lo movemos 10px hacia abajo */
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s; /* La animación */
            display: block; /* Mantenlo como bloque para que la transición funcione */
            margin-top: 0;
        }

        /* Estado final del menú cuando tiene la clase .show: visible y en su posición original */
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible; /* Lo hacemos visible y accesible */
            transform: translateY(0); /* Vuelve a su posición original (0px de desplazamiento) */
        }
        .dropdown-menu {
            position: absolute;
            left: 0;
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdowns = document.querySelectorAll('.nav-item.dropdown');

        dropdowns.forEach(function(dropdown) {
            // Evento cuando el mouse entra en el área del elemento
            dropdown.addEventListener('mouseenter', function () {
                let menu = this.querySelector('.dropdown-menu');
                if (menu) {
                    // Al añadir .show, se activa la transición CSS para mostrar el menú
                    menu.classList.add('show');
                }
            });

            // Evento cuando el mouse sale del área del elemento
            dropdown.addEventListener('mouseleave', function () {
                let menu = this.querySelector('.dropdown-menu');
                if (menu) {
                    // Al quitar .show, la transición CSS se revierte, ocultando el menú
                    menu.classList.remove('show');
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
