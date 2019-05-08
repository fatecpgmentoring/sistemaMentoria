<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carreira;

class CarreiraControllerAdmin extends Controller
{
    public function index()
    {
        $carreiras = Carreira::all();
        return view('admin.partes.carreira.index', compact('carreiras'));
    }

    public function store(Request $request)
    {
        $this->validate($request, Carreira::$regras, Carreira::$mensagens);
        $carreira = new Carreira([
            'nm_carreira' => $request->post('carreira'),
            'profissao_id_profissao' => $request->post('profissao'),
            'ds_active_carreira' => 1
        ]);

        try
        {
            $carreira->save();
            return redirect('admin/carreira/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar carreira')->withInput();
        }
    }

    public function show($id)
    {
        $carreira = Carreira::find($id);
        return response()->json($carreira);
    }

    public function edit($id)
    {
        $carreira = Carreira::find($id);
        return response()->json($carreira);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Carreira::$regras, Carreira::$mensagens);
        $carreira = Carreira::find($id);
        $carreira->nm_carreira = $request->post('carreira');
        try
        {
            $carreira->update();
            return redirect('admin/carreira/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar carreira')->withInput();
        }
    }

    public function activeOrDesactive($id)
    {
        $carreira = Carreira::find($id);
        $carreira->ds_active_carreira = $carreira->ds_active_carreira ? 0 : 1;
        try
        {
            $carreira->update();
            return json_encode(['success' => 'save']);
        }
        catch(QueryException $ex)
        {
            return json_encode(['error' => $ex]);
        }
    }

    public function destroy($id)
    {
        $carreira = Carreira::find($id);
        try
        {
            $carreira->delete();
            return redirect('admin/carreira/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao deletar carreira');
        }
    }
}
