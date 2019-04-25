<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssuntoEvento extends Model
{
    protected $table = 'tb_assunto_eventos';
    protected $primaryKey = 'id_assunto_evento';
    protected $fillable = [
        'id_ae_evento',
        'id_ae_assunto'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
