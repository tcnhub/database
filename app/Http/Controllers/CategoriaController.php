<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use App\Models\Categoria;
use App\Models\Seccion;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Request $request, $slug, Categoria $categoria)
    {
        // Buscar categoría por slug
        $categoria = Categoria::where('slug', $slug)
            ->with(['productos', 'children', 'seccion.categorias' => function ($query) {
                $query->whereNull('categoria_padre_id')->with('children');
            }])
            ->firstOrFail();

        // Cargar productos de la categoría (o subcategorías si aplica)
        $productos = $categoria->productos;

        // Si es una subcategoría, cargar también productos de la principal
        if ($categoria->categoria_padre_id) {
            $categoriaPadre = Categoria::find($categoria->categoria_padre_id);
            $productos = $productos->merge($categoriaPadre->productos ?? collect());
        }

        // Todas las secciones para la sidebar
        $secciones = Seccion::with(['categorias' => function ($query) {
            $query->whereNull('categoria_padre_id')->with('children');
        }])->get();

        $atributos = Atributo::where('seccion_id', $categoria->seccion_id)->with('valores')->get();
        // Pasa a la vista para sidebar de filtros



        

        return view('categorias.show', compact('categoria', 'productos', 'secciones', 'atributos'));
    }
}
