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
    Route::get('/perfil', 'AdminController@show')->name('admin.profile');
    Route::post('/logout', 'AdminController@show')->name('admin.logout');
    Route::get('/config', 'AdminController@show')->name('admin.config');
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
        Route::get('/', 'Admin\CarreiraControllerAdmin@index')->name('admin.carreira.index');
        Route::get('/create', 'Admin\CarreiraControllerAdmin@create')->name('admin.carreira.create');
    });
    Route::group(['prefix' => 'assunto'], function () {
        Route::get('/', 'Admin\AssuntoControllerAdmin@index')->name('admin.assunto.index');
        Route::get('/create', 'Admin\AssuntoControllerAdmin@create')->name('admin.assunto.create');
    });
});

Route::group(['prefix' => 'mentor'/*, 'middleware' => CheckMentor::class*/], function () {
   Route::get('/', function()
   {
       return view('painel-mentorado.index');
   });
});

Route::group(['prefix' => 'mentorado'/*, 'middleware' => CheckMentorado::class*/], function () {
   Route::get('/', function()
    {
        return view('painel-mentorado.index');
    });
});
