<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Mentorado;
use App\Mentor;

class MentoradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assuntos = array();
        foreach (Auth::user()->assuntos as $assunto) {
            $assuntos[] = $assunto->id_assunto;
        }
        $mentores = Mentor::orderBy('vl_nota', 'desc')->get();
        $mentores = $this->selecionaMentores($mentores, $assuntos);
        return view('painel-mentorado.dashboard-mentorado', compact('mentores'));
    }

    public function selecionaMentores($mentores, $assuntos)
    {
        $mentoresArray = array();
        foreach ($mentores as $mentor) {
            if($mentor->usuario->assuntos()->whereIn('id_assunto', $assuntos)->count() > 0  && count($mentoresArray) < 6)
            $mentoresArray[] = $mentor;
        }
        return $mentoresArray;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
