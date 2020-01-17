<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
    //
    public function index() {
        return view('test', [
            'title' => 'Curso de Laravel!! '
        ]);
    }
    */

    //
    public function index(Request $request) {
        // Imprimir variable request y finaliza la ejecucion.
        // var_dump($request);die;
        // dd($request->query('title', 'valor default'));

        return view('test', [
            'title' => $request->query('title', 'valor default')
        ]);
    }
}
