<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conexao;

class ConexaoControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conexoes = Conexao::all();
        return view('admin.partes.conexao.index', compact('conexoes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conexao = Conexao::find($id);
        return view('admin.partes.conexao.show', compact('conexao'));
    }
}
