<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssuntoMentorado extends Model
{
    protected $table = 'tb_assunto_mentorados';
    protected $primaryKey = 'id_assunto_mentorado';
    protected $fillable = [
        'id_ams_mentorado',
        'id_ams_assunto'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
