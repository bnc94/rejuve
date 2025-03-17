<?php

namespace App\Http\Controllers;

use App\Models\Competencia;

class CompetenciasController extends Controller
{
    public function index()
    {
        return view('competencias');
    }
    
    public function show($competenciaTitulo)
    {
        $competencia = Competencia::where('titulo', $competenciaTitulo)->get();

        $pruebas = $competencia[0]->pruebas;
        $pruebas = explode(",", $pruebas);

        return view('competencias.inscripcion', [
            'competencia' => $competencia,
            'pruebas' => $pruebas
        ]);
    }
}
