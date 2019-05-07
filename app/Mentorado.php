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

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'tb_assunto_mentorados');
    }

    public function conexoes()
    {
        return $this->hasMany('App\Conexao', 'mentorado_id_mentorado');
    }
}
