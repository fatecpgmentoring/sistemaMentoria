<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscritos;

class InscritoControllerAdmin extends Controller
{
    public function index()
    {
        $inscritos = Inscritos::all();
        return view('admin.partes.inscrito.index', compact('inscritos'));
    }

    public function show($id)
    {
        $inscrito = Inscritos::find($id);
        return view('admin.partes.inscrito.show', compact('inscrito'));
    }
}
