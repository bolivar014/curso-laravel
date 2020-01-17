<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Ruta Index
    public function index(){
        return view('welcome');
    }

}
