<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $primaryKey = 'id_contato';
    protected $table = 'tb_contatos';
    protected $fillable = [
        'tipo_contato',
        'ds_contato',
        'mentor_id_mentor'
    ];

    public static $regras = [
        'tipo' => 'required',
        'contato' => 'required'
    ];

    public static $mensagens = [
        'tipo.required' => 'Preencha o campo',
        'contato.required' => 'Preencha o campo'
    ];
    public function mentor()
    {
        return $this->belongsTo('App\Mentor', 'mentor_id_mentor', 'id_mentor');
    }
}