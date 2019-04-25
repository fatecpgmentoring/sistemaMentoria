<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    protected $table = 'tb_conexoes';
    protected $primaryKey = 'id_conexao';
    protected $fillable = [
        'id_c_mentorado',
        'id_c_mentor',
        'dt_fim',
        'dt_finalizado',
        'qnt_mensagens',
        'qnt_reconeccoes',
        'ds_status',
        'vl_nota'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
