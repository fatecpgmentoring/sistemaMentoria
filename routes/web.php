<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckMentor;
use App\Http\Middleware\CheckMentorado;
use App\Http\Middleware\CheckOnline;

Route::get('/contato', function () {
   return view('site.contato');
});

Route::get('/', 'SiteController@index');
Route::get('/login', function () {
    return view('site.login');
});
Route::get('/mentores', 'SiteController@mentoresAll')->name('mentores.all');
Route::get('/show/mentor/{id}', 'SiteController@showMentor')->name('mentores.all');
Route::get('/mentoresListagem', 'SiteController@mentorListagem')->name('lista.mentor');
Route::get('/logout', 'SiteController@logout');
Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('admin/logar', 'Admin\UsuarioControllerAdmin@logIn')->name('login.admin');
Route::post('logar', 'SiteController@logIn')->name('login');
Route::post('/cadastrar-site', 'SiteController@cadastro')->name('cadastrar.site');
Route::get('/icons', function()
{
    return view('admin.icons');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => CheckAdmin::class], function () {
    Route::get('/', function()
    {
        return view('admin.home');
    })->name('admin.home');
    Route::group(['prefix' => 'profissao'], function () {
        Route::get('/', 'ProfissaoControllerAdmin@index')->name('admin.profissao.index');
        Route::get('/create', 'ProfissaoControllerAdmin@create')->name('admin.profissao.create');
        Route::get('/show/{id}', 'ProfissaoControllerAdmin@show')->name('admin.profissao.show');
        Route::get('/edit/{id}', 'ProfissaoControllerAdmin@edit')->name('admin.profissao.edit');
        Route::post('/store', 'ProfissaoControllerAdmin@store')->name('admin.profissao.store');
        Route::put('/update/{id}', 'ProfissaoControllerAdmin@update')->name('admin.profissao.update');
        Route::delete('/destroy/{id}', 'ProfissaoControllerAdmin@destroy')->name('admin.profissao.destroy');
        Route::get('/status/{id}', 'ProfissaoControllerAdmin@activeOrDesactive')->name('admin.profissao.status');
    });
    Route::group(['prefix' => 'carreira'], function () {
        Route::get('/', 'CarreiraControllerAdmin@index')->name('admin.carreira.index');
        Route::get('/create', 'CarreiraControllerAdmin@create')->name('admin.carreira.create');
        Route::get('/show/{id}', 'CarreiraControllerAdmin@show')->name('admin.carreira.show');
        Route::get('/edit/{id}', 'CarreiraControllerAdmin@edit')->name('admin.carreira.edit');
        Route::post('/store', 'CarreiraControllerAdmin@store')->name('admin.carreira.store');
        Route::put('/update/{id}', 'CarreiraControllerAdmin@update')->name('admin.carreira.update');
        Route::delete('/destroy/{id}', 'CarreiraControllerAdmin@destroy')->name('admin.carreira.destroy');
        Route::get('/status/{id}', 'CarreiraControllerAdmin@activeOrDesactive')->name('admin.carreira.status');
    });
    Route::group(['prefix' => 'assunto'], function () {
        Route::get('/', 'AssuntoControllerAdmin@index')->name('admin.assunto.index');
        Route::get('/create', 'AssuntoControllerAdmin@create')->name('admin.assunto.create');
        Route::get('/show/{id}', 'AssuntoControllerAdmin@show')->name('admin.assunto.show');
        Route::get('/edit/{id}', 'AssuntoControllerAdmin@edit')->name('admin.assunto.edit');
        Route::post('/store', 'AssuntoControllerAdmin@store')->name('admin.assunto.store');
        Route::put('/update/{id}', 'AssuntoControllerAdmin@update')->name('admin.assunto.update');
        Route::delete('/destroy/{id}', 'AssuntoControllerAdmin@destroy')->name('admin.assunto.destroy');
        Route::get('/status/{id}', 'AssuntoControllerAdmin@activeOrDesactive')->name('admin.assunto.status');
    });

    Route::group(['prefix' => 'mentor'], function () {
        Route::get('/', 'MentorControllerAdmin@index')->name('admin.mentor.index');
        Route::get('/create', 'MentorControllerAdmin@create')->name('admin.mentor.create');
        Route::get('/show/{id}', 'MentorControllerAdmin@show')->name('admin.mentor.show');
        Route::get('/edit/{id}', 'MentorControllerAdmin@edit')->name('admin.mentor.edit');
        Route::post('/store', 'MentorControllerAdmin@store')->name('admin.mentor.store');
        Route::put('/update/{id}', 'MentorControllerAdmin@update')->name('admin.mentor.update');
        Route::delete('/destroy/{id}', 'MentorControllerAdmin@destroy')->name('admin.mentor.destroy');
    });

    Route::group(['prefix' => 'mentorado'], function () {
        Route::get('/', 'MentoradoControllerAdmin@index')->name('admin.mentorado.index');
        Route::get('/create', 'MentoradoControllerAdmin@create')->name('admin.mentorado.create');
        Route::get('/show/{id}', 'MentoradoControllerAdmin@show')->name('admin.mentorado.show');
        Route::get('/edit/{id}', 'MentoradoControllerAdmin@edit')->name('admin.mentorado.edit');
        Route::post('/store', 'MentoradoControllerAdmin@store')->name('admin.mentorado.store');
        Route::put('/update/{id}', 'MentoradoControllerAdmin@update')->name('admin.mentorado.update');
        Route::delete('/destroy/{id}', 'MentoradoControllerAdmin@destroy')->name('admin.mentorado.destroy');
        Route::delete('/destroy/{id}', 'MentoradoControllerAdmin@destroy')->name('admin.mentorado.destroy');
        Route::get('/mentoresListagembyMentorado', 'SiteController@mentorListagem')->name('lista.mentor.by.mentorado');
    });

    Route::group(['prefix' => 'evento'], function () {
        Route::get('/', 'EventoControllerAdmin@index')->name('admin.evento.index');
        Route::get('/create', 'EventoControllerAdmin@create')->name('admin.evento.create');
        Route::get('/show/{id}', 'EventoControllerAdmin@show')->name('admin.evento.show');
        Route::get('/edit/{id}', 'EventoControllerAdmin@edit')->name('admin.evento.edit');
        Route::post('/store', 'EventoControllerAdmin@store')->name('admin.evento.store');
        Route::put('/update/{id}', 'EventoControllerAdmin@update')->name('admin.evento.update');
        Route::delete('/destroy/{id}', 'EventoControllerAdmin@destroy')->name('admin.evento.destroy');
    });

    Route::group(['prefix' => 'comentario'], function () {
        Route::get('/', 'ComentarioControllerAdmin@index')->name('admin.comentario.index');
        Route::get('/show/{id}', 'ComentarioControllerAdmin@show')->name('admin.comentario.show');
    });

    Route::group(['prefix' => 'contato'], function () {
        Route::get('/', 'ContatoControllerAdmin@index')->name('admin.contato.index');
        Route::get('/show/{id}', 'ContatoControllerAdmin@show')->name('admin.contato.show');
    });

    Route::group(['prefix' => 'conexao'], function () {
        Route::get('/', 'ConexaoControllerAdmin@index')->name('admin.conexao.index');
        Route::get('/show/{id}', 'ConexaoControllerAdmin@show')->name('admin.conexao.show');
    });

    Route::group(['prefix' => 'inscrito'], function () {
        Route::get('/', 'InscritoControllerAdmin@index')->name('admin.inscrito.index');
        Route::get('/show/{id}', 'InscritoControllerAdmin@show')->name('admin.inscrito.show');
    });
    Route::group(['prefix' => 'usuario'], function () {
        Route::group(['prefix' => 'assunto'], function () {
            Route::get('/', 'AssuntoControllerAdmin@indexUsuarioAssunto')->name('admin.usuario.assunto.index');
            Route::get('/create', 'AssuntoControllerAdmin@createUsuarioAssunto')->name('admin.usuario.assunto.create');
            Route::post('/addUserAssunto', 'AssuntoControllerAdmin@addUsuario')->name('admin.usuario.assunto.add');
        });
    });
});
Route::group(['prefix' => 'mentor', 'namespace' => 'Mentor', 'middleware' => CheckMentor::class], function () {
    Route::get('/', 'MentorControllerMentor@index')->name('index.mentor');
    Route::get('/conexao/aceitar/', 'ConexaoControllerMentor@aceitar')->name('aceitar.mentorado');
    Route::get('/conexao/recusar/', 'ConexaoControllerMentor@recusar')->name('recusar.mentorado');
    Route::get('/chat/{id}', 'ConexaoControllerMentor@chamar')->name('chamar.mentorado');
    Route::get('/atendimento/relatorios', function(){return view('painel-mentor.atendimento.relatorio');});
    Route::get('/relatorio-creditos-e-transferencias', function(){return view('painel-mentor.relatorio-creditos-e-transferencias');});
    Route::get('/alterar-senha', function(){return view('painel-mentor.login.alterar-senha');});
    Route::get('/alterar-cadastro', function(){return view('painel-mentor.login.alterar-cadastro');});
    Route::post('/carregaAssunto', 'AssuntoControllerMentor@carregaAssunto')->name('carrega.assuntos');
    Route::post('/carregaMeusAssuntos', 'AssuntoControllerMentor@carregaMeusAssuntos')->name('carrega.assuntos.meus');
    Route::post('/carregaCarreira', 'CarreiraControllerMentor@carregaCarreira')->name('carrega.carreira');
    Route::post('/salvarAssunto', 'AssuntoControllerMentor@salvarAssunto')->name('salva.assunto.mentor');
    Route::post('/removerAssunto', 'AssuntoControllerMentor@removerAssunto')->name('remove.assunto.mentor');
    Route::get('/cadastrar-assuntos', 'AssuntoControllerMentor@cadastrarAssunto');
    Route::get('/cadastrar-conteúdo', function(){return view('painel-mentor.minha-conta.cadastrar-conteudo');});
    Route::get('/conexoes', 'ConexaoControllerMentor@conexoes')->name('conexoes.mentor');
    Route::get('/listar-comentarios', function(){return view('painel-mentor.minha-conta.listar-comentarios');});
    Route::get('/listar-conteudo', function(){return view('painel-mentor.minha-conta.listar-conteudo');});
    Route::get('/chat', function(){return view('painel-mentor.chat.chat-mentor');});
    Route::post('/cadastrar-assunto-mentor', 'AssuntoControllerMentor@cadastrarAssuntoMentor')->name('cadastrar.assunto.mentor');
});
Route::group(['prefix' => 'mentorado', 'namespace' => 'Mentorado', 'middleware' => CheckMentorado::class], function () {
   Route::get('/', 'MentoradoController@index')->name('index.mentorado.painel');
   Route::get('/atendimento/relatorios', function(){return view('painel-mentorado.atendimento.relatorio');});
   Route::get('/relatorio-creditos-e-transferencias', function(){return view('painel-mentorado.relatorio-creditos-e-transferencias');});
   Route::get('/minha-conta/alterar-senha', function(){return view('painel-mentorado.login.alterar-senha');});
   Route::get('/minha-conta/alterar-cadastro', function(){return view('painel-mentorado.login.alterar-cadastro');});

   Route::get('/cadastrar-assuntos', 'AssuntoMentoradoController@cadastrarAssunto')->name('cadastra.assunto.mentorado');
   Route::get('/listar-conteudo', function(){return view('painel-mentorado.minha-conta.listar-conteudo');});
   Route::get('/conexoes', function(){return view('painel-mentorado.minha-conta.conexões-mentores');});
   Route::get('/mentores', function(){return view('painel-mentorado.minha-conta.mentores');});
   Route::get('/chat', function(){return view('painel-mentorado.chat.chat-mentorado');});


   Route::post('/carregaAssunto', 'AssuntoMentoradoController@carregaAssunto')->name('carrega.assuntos.mentorado');
   Route::post('/carregaCarreira', 'CarreiraControllerMentor@carregaCarreira')->name('carrega.carreira');

   Route::post('/salvarAssunto', 'AssuntoMentoradoController@salvarAssunto')->name('salva.assunto.mentorado');
   Route::post('/removerAssunto', 'AssuntoMentoradoController@removerAssunto')->name('remove.assunto.mentorado');
   Route::post('/carregaMeusAssuntos', 'AssuntoMentoradoController@carregaMeusAssuntos')->name('carrega.assuntos.meus.mentorado');
   Route::post('/cadastrar-assunto-mentorado', 'AssuntoMentoradoController@cadastrarAssuntoMentorado')->name('cadastrar.assunto.mentorado');
});
Route::group(['prefix' => 'chat', 'namespace' => 'Chat'], function () {

    Route::get('/', function() {
       return view('chat.master');
    });
});
