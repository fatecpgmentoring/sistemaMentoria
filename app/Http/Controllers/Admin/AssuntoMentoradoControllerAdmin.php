<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssuntoMetorado;
use Illuminate\Database\QueryException;

class AssuntoMentoradoControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assuntos = AssuntoMentorado::join('tb_assuntos', 'id_assunto', '=', 'id_ams_assunto')
                                    ->join('tb_mentorados', 'id_mentorado', '=', 'id_ams_mentorado')->get();
        return view('', compact('assuntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assuntos = new AssuntoMetorado([
            'id_ams_assunto' => $request->post('assunto'),
            'id_ams_mentorado' => $request->post('mentorado')
        ]);

        try
        {
            $assuntos->save();
        }
        catch(QueryException $ex)
        {
            dd($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assuntos = AssuntoMentorado::join('tb_assuntos', 'id_assunto', '=', 'id_ams_assunto')
                                    ->join('tb_mentorados', 'id_mentorado', '=', 'id_ams_mentorado')
                                    ->where('id_assunto_mentorado', '=', $id)
                                    ->get();
        return view('', compact('assuntos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assuntos = AssuntoMentorado::find($id);

        try
        {
            $assuntos->delete();
        }
        catch(QueryException $ex)
        {
            dd($ex);
        }
    }
}
