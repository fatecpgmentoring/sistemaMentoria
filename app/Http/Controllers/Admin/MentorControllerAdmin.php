<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Mentor;

class MentorControllerAdmin extends Controller
{
    public function index()
    {
        $mentores = Mentor::join('tb_usuarios', 'id_vinculo', '=', 'id_mentor')->get();
        return view('admin.partes.mentor.index', compact('mentores'));
    }

    public function create()
    {
        return view('admin.partes.mentor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Mentor::$regras, Mentor::$mensagens);
        $id_user = UsuarioControllerAdmin::store($request);
        if($id_user > 0)
        {
            $mentor = new Mentor([
                'nm_mentor' => $request->post('mentor'),
                'nv_conhecimento' => $request->post('conhecimento'),
                'vl_nota' => 5,
                'usuario_id_usuario' => $id_user
            ]);

            try
            {
                $mentor->save();
                return redirect('admin/mentor/')->with('success', 'save');
            }
            catch(QueryException $ex)
            {
                return back()->withErrors('Erro ao alterar mentor')->withInput();
            }
        }
        else {
            return back()->withErrors('Erro ao cadastrar mentor')->withInput();
        }
    }

    public function show($id)
    {
        $mentor = Mentor::find($id);
        return view('admin.partes.mentor.show', compact('mentor'));
    }

    public function edit($id)
    {
        $mentor = Mentor::find($id);
        return view('admin.partes.mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Mentor::$regras, Mentor::$mensagens);
        $mentor = Mentor::find($id);
        $mentor->nm_mentor = $request->post('mentor');
        $mentor->nv_conhecimento = $request->post('conhecimento');
        $mentor->vl_nota = $request->post('nota');
        try
        {
            $mentor->update();
            return redirect('admin/mentor/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar mentor')->withInput();
        }
    }

    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        try
        {
            $mentor->delete();
            return redirect('admin/mentor/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->with('erro','Erro ao deletar mentor');
        }
    }
}
