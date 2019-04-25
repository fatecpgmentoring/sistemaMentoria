<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'tb_comentarios';
    protected $primaryKey = 'id_comentario';
    protected $fillable = [
        'ds_comentario',
        'id_comentario_conexao'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
