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
        'fk_inscrito_evento'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
