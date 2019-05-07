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

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'tb_assunto_mentores');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'mentor_id_mentor');
    }

    public function conexoes()
    {
        return $this->hasMany('App\Conexao', 'mentor_id_mentor');
    }
}
