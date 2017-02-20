<?php

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
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/nosaltres', function () {
    return view('menu/nosaltres');
});

Route::get('/nivells', function () {
    return view('nivells/form');
});

Route::get('/preguntes', function () {
    return view('puja_preguntes/form_preguntes');
});

Route::get('form_preguntes/{$count}', 'Preguntes@novaPregunta');
