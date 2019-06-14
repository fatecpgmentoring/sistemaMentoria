<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreira;

class CarreiraController extends Controller
{
    public function carregaCarreira(Request $request)
    {
        if ($request->prof != null && $request->prof != '') $carreiras = Carreira::where('ds_active_carreira', '=', 1)->where('profissao_id_profissao', '=', $request->prof)->get();
        else $carreiras = Carreira::where('ds_active_carreira', '=', 1)->get();
        return json_encode(array('carreiras' => $carreiras->toArray()));
    }
}