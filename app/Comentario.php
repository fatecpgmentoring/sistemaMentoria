<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'tb_comentarios';
    protected $primaryKey = 'id_comentario';
    protected $fillable = [
        'vl_nota',
        'ds_comentario',
        'mentor_id_mentor',
        'mentorado_id_mentorado'
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function mentor()
    {
        return $this->belongsTo('App\Mentor', 'mentor_id_mentor', 'id_mentor');
    }

    public function mentorado()
    {
        return $this->belongsTo('App\Mentorado', 'mentorado_id_mentorado', 'id_mentorado');
    }
}