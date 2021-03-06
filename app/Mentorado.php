<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentorado extends Model
{
    protected $table = 'tb_mentorados';
    protected $primaryKey = 'id_mentorado';
    protected $fillable = [
        'nm_mentorado',
        'usuario_id_usuario',
        'ds_foto'
    ];

    public static $regras=[
        'email' => 'bail|required|email|min:10|max:100|unique:tb_usuarios,email',
        'senha' => 'bail|required|min:8|max:100|confirmed',
        'mentorado' => 'bail|required|min:3|max:100'
    ];

    public static $regrasUpdate=[
      //  'email' => 'bail|required|email|min:10|max:100',
        'mentorado' => 'bail|required|min:3|max:100'
    ];
    public static $mensagens = [
        'email.required' => 'E-mail obrigatorio',
        'email.email' => 'E-mail invalido',
        'email.min' => 'E-mail muito pequeno',
        'email.max' => 'E-mail muito grande',
        'email.unique' => 'E-mail já utilizado',
        'senha.required' => 'Senha obrigatoria',
        'senha.min' => 'Senha muito pequena',
        'senha.max' => 'Senha muito grande',
        'senha.confirmed' => 'Senhas não conferem',
        'mentorado.required' => 'Nome obrigatorio',
        'mentorado.min' => 'Nome muito pequeno',
        'mentorado.max' => 'Nome muito grande',
    ];

    public function conexoes()
    {
        return $this->hasMany('App\Conexao', 'mentorado_id_mentorado');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id_usuario', 'id_usuario');
    }
}
