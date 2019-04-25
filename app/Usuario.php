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
        'id_vinculo',
        'cd_status'
    ];

    public static $regras;
    public static $mensagens = [];
}
