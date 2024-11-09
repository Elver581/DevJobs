<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacante $vacante)
    {
        $vacante->load('candidatos.user');
     return view('candidatos.index',[
        'vacante'=>$vacante
     ]);
    }



    
}
