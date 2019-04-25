<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'tb_assuntos';
    protected $primaryKey = 'id_assunto';
    protected $fillable = [
        'nm_assunto',
        'ds_active_assunto',
        'id_assunto_carreira'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
