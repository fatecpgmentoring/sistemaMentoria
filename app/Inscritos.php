<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscritos extends Model
{
    protected $table = 'tb_inscritos';
    protected $primaryKey = 'id_inscrito';
    protected $fillable = [
        'nm_inscrito',
        'cd_cpf',
        'cd_rg',
        'cd_cep',
        'nm_email',
        'ds_endereco',
        'nm_estado',
        'dt_nascimento',
        'ds_status_pagamento',
        'evento_id_evento'
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'evento_id_evento', 'id_evento');
    }

    public static $regras = [];
    public static $mensagens = [];
}
