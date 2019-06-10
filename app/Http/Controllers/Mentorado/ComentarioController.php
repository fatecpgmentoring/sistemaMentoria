<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use App\Mentor;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $comentario = new Comentario([
            'vl_nota' => $request->nota,
            'ds_comentario' => $request->comentario,
            'mentor_id_mentor' => $request->mentor,
            'mentorado_id_mentorado' => $request->mentorado
        ]);
        $comentarioCount = Comentario::where('mentorado_id_mentorado', $request->mentorado)->where('mentor_id_mentor', $request->mentor)->first();
        if ($comentarioCount->count() == 0) {
            $comentario->save();
        } else {
            $comentario = Comentario::find($comentarioCount->id_comentario);
            $comentario->vl_nota = $request->nota != "" ? $request->nota : $comentario->vl_nota;
            $comentario->ds_comentario = $request->comentario != "" ? $request->comentario : $comentario->ds_comentario;
            $comentario->update();
        }
        $mentor = Mentor::find($request->mentor);
        $valor = 0;
        $count = 0;
        foreach ($mentor->comentarios as $comentario) {
            $valor = $valor + $comentario->vl_nota;
            $count++;
        }
        $mentor->vl_nota = $valor / $count;
        $mentor->update();
        return json_encode($comentario->toArray());
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