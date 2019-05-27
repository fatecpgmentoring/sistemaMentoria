<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Mentorado;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\UsuarioController;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\ImageRepository;

class MentoradoControllerAdmin extends Controller
{
    public function index()
    {
        $mentorados = Mentorado::all();
        return view('admin.partes.mentorado.index', compact('mentorados'));
    }

    public function create()
    {
        return view('admin.partes.mentorado.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Mentorado::$regras, Mentorado::$mensagens);
        $id_user = UsuarioControllerAdmin::store($request);
        if($id_user > 0)
        {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $destino = 'images/usuarios/' . round(microtime(true) * 1000).".".$extension;
            $arquivo_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino  );
            $mentorado = new Mentorado([
                'nm_mentorado' => $request->post('mentorado'),
                'usuario_id_usuario' => $id_user,
                'ds_foto' => $destino
            ]);
            try
            {
                $mentorado->save();
                return redirect('admin/mentorado')->with('success', 'save');
            }
            catch(QueryException $ex)
            {
                return back()->withErrors('Erro ao salvar mentorado')->withInputs();
            }
        }
        else
        {
            return back()->withErrors('Erro ao salvar mentorado')->withInputs();
        }
    }

    public function show($id)
    {
        $mentorado = Mentorado::find($id);
        return view('admin.partes.mentorado.show', compact('mentorado'));
    }

    public function edit($id)
    {
        $mentorado = Mentorado::find($id);
        return view('admin.partes.mentorado.edit', compact('mentorado'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Mentorado::$regrasUpdate, Mentorado::$mensagens);
        $mentorado = Mentorado::find($id);
        $usuario = Usuario::find($mentorado->usuario_id_usuario);
        $mentorado->nm_mentorado = $request->post('mentorado');
        $usuario->email = $request->post('email');
        if($request->foto != null)
        {
            $repo = new ImageRepository();
            $repo->apagarImages($mentorado->ds_foto);
            $mentorado->ds_foto = $repo->saveImage($request->foto);
        }
        try
        {
            $mentorado->update();
            $usuario->save();
            return redirect('admin/mentorado/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar mentorado')->withInput();
        }
    }

    public function destroy($id)
    {
        $mentorado = Mentorado::find($id);
        try
        {
            $repo = new ImageRepository();
            $repo->apagarImages($mentorado->ds_foto);
            UsuarioControllerAdmin::destroy($mentorado->usuario_id_usuario);
            $mentorado->delete();
            return redirect('admin/mentorado/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->with('erro', 'Erro ao deletar mentorado');
        }
    }
}
