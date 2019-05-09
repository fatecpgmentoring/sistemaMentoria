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
        'carreira_id_carreira',
        'assunto_log'
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function carreira()
    {
        return $this->belongsTo('App\Carreira', 'carreira_id_carreira', 'id_carreira');
    }

    public function mentorados()
    {
        return $this->belongsToMany(Mentorado::class, 'tb_assunto_mentorados');
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'tb_assunto_eventos');
    }
    //
    public function mentores()
    {
        return $this->belongsToMany(Mentor::class, 'tb_assunto_mentores');
    }

    public function conexoes()
    {
       return $this->hasMany('App\Conexao', 'assunto_id_assunto');
    }
}
