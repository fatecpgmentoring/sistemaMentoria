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

    public static $regras=[
        'email' => 'bail|required|email|min:10|max:100|unique:tb_usuarios,email',
        'senha' => 'bail|required|min:8|max:100|confirmed',
        'mentor' => 'bail|required|min:3|max:100',
        'conhecimento' => 'required'
    ];
    public static $mensagens = [
        'email.required' => 'E-mail obrigatorio',
        'email.email' => 'E-mail invalido',
        'email.min' => 'E-mail muito pequeno',
        'email.max' => 'E-mail muito grande',
        'email.unique' => 'E-mail já utilizado',
        'senha.required' => 'Senha obrigatoria',
        'senha.min' => 'Senha muito pequena',
        'senha.max' => 'Senha muito grande',
        'senha.confirmed' => 'Senhas não conferem',
        'mentor.required' => 'Nome obrigatorio',
        'mentor.min' => 'Nome muito pequeno',
        'mentor.max' => 'Nome muito grande',
        'conhecimento.required' => 'Conhecimento obrigatorio'
    ];

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

    public function contatos()
    {
        return $this->hasMany('App\Contato', 'mentor_id_mentor');
    }
}
