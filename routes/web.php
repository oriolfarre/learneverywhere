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

use App\Preguntes;
use App\Respostes;

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

Route::get('/activitats', function () {

	$preguntes = Preguntes::all();
	
    return view('activitats/activitats', compact('preguntes'));
});

Route::get('activitats/{id_pregunta}', function($id){

	$pregunta = Preguntes::all()->where('id_pregunta', $id);
	$respostes =Respostes::all()->where('id_pregunta', $id);


	
	return view('activitats/pregunta', compact('pregunta','respostes'));

	});

Route::get('resolution', function(){
	$id_resposta = Request()->all();
	$compare = Respostes::all()->where('id_resposta',$id_resposta["resposta"]);

	echo $compare;
	$id_pregunta = $compare['id_pregunta'];
	echo $id_pregunta;


	return view('activitats/resolution',compact('compare'));
	

	
});
