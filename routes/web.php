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

Route::group(['prefix' => 'admin'/*, 'middleware' => CheckAdmin::class*/], function () {
    Route::get('/', function()
    {
        return view('admin.home.index');
    });

    Route::get('charts', function(){ return view('admin.mcharts'); })->name('charts'); 
    Route::get('tables', function(){ return view('admin.table'); })->name('tables'); 
    Route::get('forms', function(){ return view('admin.form'); })->name('forms'); 
    Route::get('panels', function(){ return view('admin.panel'); })->name('panels'); 
    Route::get('buttons', function(){ return view('admin.buttons'); })->name('buttons');
    Route::get('notifications', function(){ return view('admin.notifications'); })->name('notifications'); 
    Route::get('typography', function(){ return view('admin.typography'); })->name('typography'); 
    Route::get('icons', function(){ return view('admin.icons'); })->name('icons'); 
    Route::get('grid', function(){ return view('admin.grid'); })->name('grid'); 
    Route::get('blank', function(){ return view('admin.blank'); })->name('blank'); 
    Route::get('login', function(){ return view('admin.login'); })->name('login'); 
    Route::get('documentation', function(){ return view('admin.documentation'); })->name('documentation'); 
});

Route::group(['prefix' => 'mentor', 'middleware' => CheckMentor::class], function () {
    Route::get('/', function()
    {
        return view('painel-mentor.index');
    });
});

Route::group(['prefix' => 'mentorado', 'middleware' => CheckMentorado::class], function () {
    Route::get('/mentorado', function()
    {
        return view('painel-mentorado.index');
    });
});
