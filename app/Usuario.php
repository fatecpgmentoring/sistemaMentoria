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

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'tb_assunto_usuarios');
    }
}
