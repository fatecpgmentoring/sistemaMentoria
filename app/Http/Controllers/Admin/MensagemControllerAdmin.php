<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Mensagem;

class MensagemControllerAdmin extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::all();
        return view('admin.partes.mensagem.index', compact('mensagens'));
    }

    public function show($id)
    {
        $mensagem = Mensagem::find($id);
        return view('admin.partes.mensagem.show', compact('mensagem'));
    }
}
