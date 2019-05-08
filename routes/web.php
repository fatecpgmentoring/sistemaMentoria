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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'/*, 'middleware' => CheckAdmin::class*/], function () {
    Route::get('/', function()
    {
        return view('admin.home');
    })->name('admin.home');
    Route::group(['prefix' => 'profissao'], function () {
        Route::get('/', 'ProfissaoControllerAdmin@index')->name('admin.profissao.index');
        Route::get('/show/{id}', 'ProfissaoControllerAdmin@show')->name('admin.profissao.show');
        Route::get('/edit/{id}', 'ProfissaoControllerAdmin@edit')->name('admin.profissao.edit');
        Route::post('/store', 'ProfissaoControllerAdmin@store')->name('admin.profissao.store');
        Route::put('/update', 'ProfissaoControllerAdmin@update')->name('admin.profissao.update');
        Route::delete('/destroy/{id}', 'ProfissaoControllerAdmin@destroy')->name('admin.profissao.destroy');
        Route::get('/status', 'ProfissaoControllerAdmin@activeOrDesactive')->name('admin.profissao.status');
    });
    Route::group(['prefix' => 'carreira'], function () {
        Route::get('/', 'CarreiraControllerAdmin@index')->name('admin.carreira.index');
        Route::get('/show/{id}', 'CarreiraControllerAdmin@show')->name('admin.carreira.show');
        Route::get('/edit/{id}', 'CarreiraControllerAdmin@edit')->name('admin.carreira.edit');
        Route::post('/store', 'CarreiraControllerAdmin@store')->name('admin.carreira.store');
        Route::put('/update', 'CarreiraControllerAdmin@update')->name('admin.carreira.update');
        Route::delete('/destroy/{id}', 'CarreiraControllerAdmin@destroy')->name('admin.carreira.destroy');
        Route::get('/status', 'CarreiraControllerAdmin@activeOrDesactive')->name('admin.carreira.status');
    });
    Route::group(['prefix' => 'assunto'], function () {
        Route::get('/', 'AssuntoControllerAdmin@index')->name('admin.assunto.index');
        Route::get('/show/{id}', 'AssuntoControllerAdmin@show')->name('admin.assunto.show');
        Route::get('/edit/{id}', 'AssuntoControllerAdmin@edit')->name('admin.assunto.edit');
        Route::post('/store', 'AssuntoControllerAdmin@store')->name('admin.assunto.store');
        Route::put('/update', 'AssuntoControllerAdmin@update')->name('admin.assunto.update');
        Route::delete('/destroy/{id}', 'AssuntoControllerAdmin@destroy')->name('admin.assunto.destroy');
        Route::get('/status', 'AssuntoControllerAdmin@activeOrDesactive')->name('admin.assunto.status');
    });

    Route::group(['prefix' => 'mentor'], function () {
        Route::get('/', 'MentorControllerAdmin@index')->name('admin.mentor.index');
        Route::get('/show/{id}', 'MentorControllerAdmin@show')->name('admin.mentor.show');
        Route::get('/edit/{id}', 'MentorControllerAdmin@edit')->name('admin.mentor.edit');
        Route::post('/store', 'MentorControllerAdmin@store')->name('admin.mentor.store');
        Route::put('/update', 'MentorControllerAdmin@update')->name('admin.mentor.update');
        Route::delete('/destroy/{id}', 'MentorControllerAdmin@destroy')->name('admin.mentor.destroy');
    });

    Route::group(['prefix' => 'mentorado'], function () {
        Route::get('/', 'MentoradoControllerAdmin@index')->name('admin.mentorado.index');
        Route::get('/show/{id}', 'MentoradoControllerAdmin@show')->name('admin.mentorado.show');
        Route::get('/edit/{id}', 'MentoradoControllerAdmin@edit')->name('admin.mentorado.edit');
        Route::post('/store', 'MentoradoControllerAdmin@store')->name('admin.mentorado.store');
        Route::put('/update', 'MentoradoControllerAdmin@update')->name('admin.mentorado.update');
        Route::delete('/destroy/{id}', 'MentoradoControllerAdmin@destroy')->name('admin.mentorado.destroy');
    });

    Route::group(['prefix' => 'usuario'], function () {
        Route::get('/', 'UsuarioControllerAdmin@index')->name('admin.usuario.index');
        Route::get('/show/{id}', 'UsuarioControllerAdmin@show')->name('admin.usuario.show');
        Route::get('/edit/{id}', 'UsuarioControllerAdmin@edit')->name('admin.usuario.edit');
        Route::post('/store', 'UsuarioControllerAdmin@store')->name('admin.usuario.store');
        Route::put('/update', 'UsuarioControllerAdmin@update')->name('admin.usuario.update');
        Route::delete('/destroy/{id}', 'UsuarioControllerAdmin@destroy')->name('admin.usuario.destroy');
    });

    Route::group(['prefix' => 'evento'], function () {
        Route::get('/', 'EventoControllerAdmin@index')->name('admin.evento.index');
        Route::get('/show/{id}', 'EventoControllerAdmin@show')->name('admin.evento.show');
        Route::get('/edit/{id}', 'EventoControllerAdmin@edit')->name('admin.evento.edit');
        Route::post('/store', 'EventoControllerAdmin@store')->name('admin.evento.store');
        Route::put('/update', 'EventoControllerAdmin@update')->name('admin.evento.update');
        Route::delete('/destroy/{id}', 'EventoControllerAdmin@destroy')->name('admin.evento.destroy');
    });

    Route::group(['prefix' => 'comentario'], function () {
        Route::get('/', 'ComentarioControllerAdmin@index')->name('admin.comentario.index');
        Route::get('/show/{id}', 'ComentarioControllerAdmin@show')->name('admin.comentario.show');
    });

    Route::group(['prefix' => 'mensagem'], function () {
        Route::get('/', 'MensagemControllerAdmin@index')->name('admin.mensagem.index');
        Route::get('/show/{id}', 'MensagemControllerAdmin@show')->name('admin.mensagem.show');
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
});

Route::group(['prefix' => 'mentor', 'namespace' => 'Mentor'/*, 'middleware' => CheckMentor::class*/], function () {
   Route::get('/', function()
   {
       return view('painel-mentorado.index');
   });
});

Route::group(['prefix' => 'mentorado', 'namespace' => 'Mentorado'/*, 'middleware' => CheckMentorado::class*/], function () {
   Route::get('/', function()
    {
        return view('painel-mentorado.index');
    });
});
