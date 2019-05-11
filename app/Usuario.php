<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'email',
        'password',
        'cd_role',
        'cd_status'
    ];

    public static $regras=[
        'email' => 'bail|required|email|min:10|max:100',
        'senha' => 'bail|required|min:8|max:100|confirmed',
        'role' => 'bail|required|digits:1',
        'status' => 'bail|digits:1'
    ];
    public static $mensagens = [
        'email.required' => 'E-mail obrigatorio',
        'email.email' => 'E-mail invalido',
        'email.min' => 'E-mail muito pequeno',
        'email.max' => 'E-mail muito grande',
        'senha.required' => 'Senha obrigatoria',
        'senha.min' => 'Senha muito pequena',
        'senha.max' => 'Senha muito grande',
        'senha.confirmed' => 'Senhas não conferem',
        'role.required' => 'Permissão obrigatoria',
        'role.digits' => 'Permissão invalida',
        'status.digits' => 'Status invalido'
    ];

    public function mentor()
    {
        return $this->hasOne('App\Mentor', 'usuario_id_usuario', 'id_usuario');
    }

    public function mentorado()
    {
        return $this->hasOne('App\Mentorado', 'usuario_id_usuario', 'id_usuario');
    }
}
