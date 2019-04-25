<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'tb_logs';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'ds_log',
        'ds_table'
    ];

    public static $regras = [];
    public static $mensagens = [];
}
