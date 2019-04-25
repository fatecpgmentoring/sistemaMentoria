<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentorado extends Model
{
    protected $table = 'tb_mentorados';
    protected $primaryKey = 'id_mentor';
    protected $fillable = [
        'nm_mentorado'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
