<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssuntoMentor extends Model
{
    protected $table = 'tb_assunto_mentores';
    protected $primaryKey = 'id_assunto_mentor';
    protected $fillable = [
        'id_am_mentor',
        'id_am_assunto'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
