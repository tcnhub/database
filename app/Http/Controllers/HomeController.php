<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Seccion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index() {


        return view('welcome');
    }
}
