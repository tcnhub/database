<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use App\Models\Categoria;
use App\Models\Seccion;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /*
     * este codigo funciona enla ruta principal /productos
     * agrego mas abajo el metodo show con la funcionalidad para filtro dentro de la categoeia
    public function show(Request $request, $slug)
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
    */

    public function show(Request $request, $slug)
    {
        // Buscar categoría por slug
        $categoria = Categoria::where('slug', $slug)
            ->with(['productos.valoresAtributos.atributo', 'children', 'seccion.categorias' => function ($query) {
                $query->whereNull('categoria_padre_id')->with('children');
            }])
            ->firstOrFail();

        // Cargar productos de la categoría (o subcategorías si aplica)
        $productos = $categoria->productos;

        // Si es una subcategoría, cargar también productos de la principal
        if ($categoria->categoria_padre_id) {
            $categoriaPadre = Categoria::with('productos.valoresAtributos.atributo')
                ->find($categoria->categoria_padre_id);

            if ($categoriaPadre) {
                $productos = $productos->merge($categoriaPadre->productos);
            }
        }

        // Todas las secciones para la sidebar
        $secciones = Seccion::with(['categorias' => function ($query) {
            $query->whereNull('categoria_padre_id')->with('children');
        }])->get();

        // 🔹 NUEVO: obtener los IDs de atributos presentes en los productos reales
        $atributosIds = $productos->flatMap(function ($producto) {
            return $producto->valoresAtributos->pluck('atributo.id');
        })->unique();

        // 🔹 NUEVO: cargar solo los atributos que están presentes en los productos actuales
        $atributos = Atributo::with('valores')
            ->whereIn('id', $atributosIds)
            ->get();

        return view('categorias.show', compact('categoria', 'productos', 'secciones', 'atributos'));
    }
}
