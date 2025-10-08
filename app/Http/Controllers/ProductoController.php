<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\Atributo;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Producto::query();

        // FILTRO POR ATRIBUTO (Ej: ?filtro=memoria-ram=16GB)
        if ($request->has('filtro')) {
            [$atributoSlug, $valorNombre] = explode('=', $request->filtro);

            $query->whereHas('valoresAtributos', function ($q) use ($atributoSlug, $valorNombre) {
                $q->whereHas('atributo', function ($qa) use ($atributoSlug) {
                    $qa->where('slug', $atributoSlug);
                })
                    ->where('valor', $valorNombre);
            });
        }

        // FILTRO POR CATEGORÍA (opcional si estás en vista de categorías)
        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $productos = $query->get();

        // Traemos los atributos para mostrar el sidebar de filtros
        $atributos = Atributo::with('valores')->get();

        return view('productos.index', compact('productos', 'atributos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {



        $secciones = Seccion::with([
            'categorias' => function($q) {
                $q->whereNull('categoria_padre_id')->with('children');
            }
        ])->get();


        // parea mostrar las secciones en el menu con sus hijso y subhijos
        // Traer las categorías hijas de la sección del producto
        $categorias = Categoria::where('seccion_id', $producto->seccion_id)
            ->whereNull('categoria_padre_id') // solo raíz si quieres
            ->with('children')       // incluir subcategorías
            ->get();




        return view('productos.show', compact('producto', 'secciones', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filtrar(Request $request)
    {
        $filtros = $request->input('filtros', []);

        $query = Producto::query();

        // 🔹 Cada grupo de atributo actúa como un "AND"
        foreach ($filtros as $slug => $valoresSeleccionados) {
            $query->whereHas('valoresAtributos', function ($q) use ($slug, $valoresSeleccionados) {
                $q->whereHas('atributo', function ($qa) use ($slug) {
                    $qa->where('slug', $slug);
                })
                    ->whereIn('valor', $valoresSeleccionados);
            });
        }

        $productos = $query->get();

        // estos dos son para que la sidebar con los atributos este seccionado  en accordionon de bs5
        // le pongo otra variable a $productos y le pongo a $productos_secciones para evitar redeclaramiento de variable
        $productos_sidebar = Producto::all(); // o con tus filtros previos
        $secciones = Seccion::with('atributos.valores')->get();



        return view('productos.partials.lista', compact('productos', 'productos_sidebar', 'secciones'))->render();

    }
}
