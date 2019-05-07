<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'tb_mensagens';
    protected $primaryKey = 'id_mensagem';
    protected $fillable = [
        'ds_mensagem',
        'conexao_id_conexao',
        'ds_mensagem_vista',
        'id_flag'
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function conexao()
    {
        $this->belongsTo('App\Conexao','conexao_id_conexao', 'id_conexao');
    }
}
