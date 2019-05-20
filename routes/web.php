<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckMentor;
use App\Http\Middleware\CheckMentorado;
use App\Http\Middleware\CheckOnline;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.homepage.index');
});

Route::get('/login', function () {
    return view('site.login');
});

Route::group(['middleware' => CheckOnline::class], function () {

});

Route::get('/icons', function()
{
    return view('admin.icons');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'/*, 'middleware' => CheckAdmin::class*/], function () {
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

Route::group(['prefix' => 'mentor', 'namespace' => 'Mentor'/*, 'middleware' => CheckMentor::class*/], function () {
   Route::get('/', function()
   {
       return view('painel-mentor.dashboard-mentor');
   });
   Route::get('/atendimento/relatorios', function(){return view('painel-mentor.atendimento.relatorio');});
   Route::get('/relatorio-creditos-e-transferencias', function(){return view('painel-mentor.relatorio-creditos-e-transferencias');});
   Route::get('/minha-conta/alterar-senha', function(){return view('painel-mentor.login.alterar-senha');});
   Route::get('/minha-conta/alterar-cadastro', function(){return view('painel-mentor.login.alterar-cadastro');});
});

Route::group(['prefix' => 'mentorado', 'namespace' => 'Mentorado'/*, 'middleware' => CheckMentorado::class*/], function () {
   Route::get('/', function()
    {
        return view('painel-mentorado.dashboard-mentorado');
    });
   Route::get('/atendimento/relatorios', function(){return view('painel-mentorado.atendimento.relatorio');});
   Route::get('/relatorio-creditos-e-transferencias', function(){return view('painel-mentorado.relatorio-creditos-e-transferencias');});
   Route::get('/minha-conta/alterar-senha', function(){return view('painel-mentorado.login.alterar-senha');});
   Route::get('/minha-conta/alterar-cadastro', function(){return view('painel-mentorado.login.alterar-cadastro');});

});
