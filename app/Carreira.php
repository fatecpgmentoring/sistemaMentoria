<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreira extends Model
{
    protected $table = 'tb_carreiras';
    protected $primaryKey = 'id_carreira';
    protected $fillable = [
        'nm_carreira',
        'ds_active_carreira',
        'profissao_id_profissao',
        'carreira_log'
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function assuntos()
    {
       return $this->hasMany('App\Assunto', 'carreira_id_carreira');
    }

    public function profissao()
    {
        return $this->belongsTo('App\Profissao', 'profissao_id_profissao', 'id_profissao');
    }


}
