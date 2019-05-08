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

    public function mentor()
    {
        return $this->belongsTo('App\Mentor', 'mentor_id_mentor', 'id_mentor');
    }
}
