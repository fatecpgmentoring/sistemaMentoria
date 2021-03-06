<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Comentario;

class ComentarioControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return view('admin.partes.comentario.index', compact('comentarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);
        return view('admin.partes.comentario.show', compact('comentario'));
    }
}
