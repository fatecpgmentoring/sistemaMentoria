<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'tb_mensagens';
    protected $primaryKey = 'id_mensagem';
    protected $fillable = [
        'ds_mensagem',
        'id_mensagem_conexao',
        'ds_mensagem_vista'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
