<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Seccion;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

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




        return view('single-producto', compact('producto', 'secciones', 'categorias'));
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
}
