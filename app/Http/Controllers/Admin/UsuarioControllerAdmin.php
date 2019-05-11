<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Mentorado;
use App\Usuario;

class UsuarioControllerAdmin extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.partes.usuario.index', compact('usuarios'));
    }

    public static function store(Request $request)
    {
        $usuario = new Usuario([
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('senha')),
            'cd_role' => intval($request->post('role')),
            'cd_status' => $request->post('status'),
        ]);

        try
        {
            $usuario->save();
            return $usuario->id_usuario;
        }
        catch(QueryException $ex)
        {
            return 0;
        }
    }

    public function show($id)
    {
        $usuario = Usuario::leftJoin('tb_mentores', 'id_mentor', '=', 'id_vinculo')
        ->leftJoin('tb_mentorados', 'id_mentorado', '=', 'id_vinculo')
        ->where('id_usuario', $id)->first();
        return view('admin.partes.usuario.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('admin.partes.usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Usuario::$regras, Usuario::$mensagens);
        $usuario = Usuario::find($id);
        $usuario->email = $request->post('email');
        try
        {
            $usuario->update();
            return redirect('admin/usuario/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar usuario')->withInput();
        }
    }

    public function status($id)
    {
        $usuario = Usuario::find($id);
        $usuario->cd_status = $usuario->cd_status ? 0 : 1;
        try
        {
            $usuario->update();
            return back();
        }
        catch(QueryException $ex)
        {
            return back();
        }
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, Usuario::$regras, Usuario::$mensagens);
        $usuario = Usuario::find($id);
        if(Hash::check($request->last_password, $usuario->password))
        {
            $usuario->password = Hash::make($request->last_password);
        }
        else
        {
            return redirect('admin/usuario/')->with('failSenha', 'errroLastSenha');
        }

        try
        {
            $usuario->update();
            return redirect('admin/usuario/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar senha')->withInput();
        }
    }

    public function logIn(Request $request)
    {
        $this->validate($request, Usuario::$regras, Usuario::$mensagens);
        $credenciais = $request->only('email', 'senha');
        if(Auth::attempt($credenciais))
        {
            return redirect('/admin');
        }
        else
        {
            return redirect('/loginAdmin')->with('failure', 'Senha incorreta');
        }
    }

    public function logOff(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function blockUnblock($id)
    {
        $usuario = Usuario::find($id);
        $usuario->cd_status = $usuario->cd_status ? 0 : 1;
        try
        {
            $usuario->update();
            return json_encode(['success' => 'save']);
        }
        catch(QueryException $ex)
        {
            return json_encode(['error' => $ex]);
        }
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        try
        {
            $usuario->delete();
            return redirect('admin/usuario/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->whit('erro','Erro ao deletar usuario');
        }
    }
}
