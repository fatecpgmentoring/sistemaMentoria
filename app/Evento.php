<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'tb_eventos';
    protected $primaryKey = 'id_evento';
    protected $fillable = [
        'nm_titulo',
        'ds_local',
        'ds_assuntos',
        'ds_evento',
        'dt_inicio',
        'dt_fim',
        'hr_inicio',
        'hr_fim',
        'qnt_max_inscritos',
        'qnt_inscritos',
        'vl_inscricao'
    ];

    public static $regras = [];
    public static $mensagens = [];

}
