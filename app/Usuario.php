<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_usuarios';
    protected $rememberTokenName = false;
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'email',
        'password',
        'cd_role',
        'cd_status'
    ];
    protected $hidden = ['password'];
    public static $regras=[
        'email' => 'bail|required',
        'password' => 'bail|required',
    ];

    public static $mensagens = [
        'email.required' => 'E-mail obrigatorio',
        'password.required' => 'Senha obrigatoria'
    ];
    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'tb_assunto_usuarios');
    }
}
