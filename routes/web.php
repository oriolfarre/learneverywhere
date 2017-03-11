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
// Auth routes
Auth::routes();
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@updateAvatar');

use App\Preguntes;
use App\Respostes;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'PreguntesController@sessionRestart');

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


// Route::get('/activitats', function () {
//     return view('activitats/preguntes');
// });



Route::post('/preguntes', 'PreguntesController@novaPregunta');

//PREGUNTES:

Route::get('/activitat', function () {
    return view('activitats/activitat');
});

Route::get('nivell/{nivell}', 'PreguntesController@getPreguntes');

Route::get('resolution', 'PreguntesController@comprove');
