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

Route::group(['middleware' => CheckOnline::class], function () {

});

Route::group(['prefix' => 'admin', 'middleware' => CheckAdmin::class], function () {
    Route::get('/', function()
    {
        return view('admin.index');
    });
});

Route::group(['prefix' => 'mentor', 'middleware' => CheckMentor::class], function () {
    Route::get('/', function()
    {
        return view('site.painel-mentor.index');
    });
});

Route::group(['prefix' => 'mentorado', 'middleware' => CheckMentorado::class], function () {
    Route::get('/', function()
    {
        return view('site.painel-mentorado.index');
    });
});
