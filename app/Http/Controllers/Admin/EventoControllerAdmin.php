<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Evento;

class EventoControllerAdmin extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.partes.evento.index', compact('eventos'));
    }

    public function create()
    {
        return view('admin.partes.evento.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Evento::$regras, Evento::$mensagens);
        $evento = new Evento([
            'nm_titulo' => $request->post('titulo'),
            'ds_local'  => $request->post('local'),
            'ds_evento'  => $request->post('evento'),
            'dt_inicio'  => $request->post('inicio'),
            'dt_fim'  => $request->post('fim'),
            'hr_inicio'  => $request->post('inicio_hr'),
            'hr_fim'  => $request->post('fim_hr'),
            'qnt_max_inscritos'  => $request->post('max_inscritos'),
            'qnt_inscritos' => 0,
            'vl_inscricao' => $request->post('valor'),
        ]);

        try
        {
            $evento->save();
            return redirect('admin/evento/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar evento')->withInput();
        }
    }

    public function show($id)
    {
        $evento = Evento::find($id);
        return view('admin.partes.evento.show', compact('evento'));
    }

    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('admin.partes.evento.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Evento::$regras, Evento::$mensagens);
        $evento = Evento::find($id);
        $evento->nm_titulo = $request->post('titulo');
        $evento->ds_evento  = $request->post('evento');
        $evento->qnt_max_inscritos  = $evento->qnt_max_inscritos < $request->post('max_inscritos') ? $request->post('max_inscritos') : $evento->qnt_max_inscritos;
        try
        {
            $evento->update();
            return redirect('admin/evento/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar evento')->withInput();
        }
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        try
        {
            $evento->delete();
            return redirect('admin/evento/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao deletar evento');
        }
    }
}
