<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = 'tb_mentores';
    protected $primaryKey = 'id_mentor';
    protected $fillable = [
        'nm_mentor',
        'nv_conhecimento',
        'vl_nota'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
