<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    protected $table = 'tb_conexoes';
    protected $primaryKey = 'id_conexao';
    protected $fillable = [
        'mentorado_id_mentorado',
        'mentor_id_mentor',
        'assunto_id_assunto',
        'dt_fim',
        'dt_finalizado',
        'qnt_mensagens',
        'qnt_reconeccoes',
        'ds_status',
        'vl_nota',
    ];

    public static $regras = [];
    public static $mensagens = [];

    public function assunto()
    {
        return $this->belongsTo('App\Assunto', 'assunto_id_assunto', 'id_assunto');
    }

    public function mentor()
    {
        return $this->belongsTo('App\Mentor', 'mentor_id_mentor', 'id_mentor');
    }

    public function mentorado()
    {
        return $this->belongsTo('App\Mentorado', 'mentorado_id_mentorado', 'id_mentorado');
    }

    public function mensagens()
    {
        return $this->hasMany('App\Mensagem', 'conexao_id_conexao');
    }
}
