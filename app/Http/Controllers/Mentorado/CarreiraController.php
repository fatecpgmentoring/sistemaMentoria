<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarreiraController extends Controller
{
    public function index()
    {
        //
    }

    public function carregaCarreira(Request $request)
    {
        if($request->prof != null && $request->prof != '') $carreiras = Carreira::where('ds_active_carreira', '=', 1)->where('profissao_id_profissao', '=', $request->prof)->get();
        else $carreiras = Carreira::where('ds_active_carreira', '=', 1)->get();
        return json_encode($carreiras);
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
