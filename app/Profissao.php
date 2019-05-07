<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    protected $table = 'tb_profissoes';
    protected $primaryKey = 'id_profissao';
    protected $fillable = [
        'nm_profissao',
        'ds_active_profissao'
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function carreiras()
    {
       return $this->hasMany('App\Carreira', 'carreira_id_carreira');
    }
}
