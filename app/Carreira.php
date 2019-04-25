<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreira extends Model
{
    protected $table = 'tb_carreiras';
    protected $primaryKey = 'id_carreira';
    protected $fillable = [
        'nm_carreira',
        'ds_active_carreira'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
