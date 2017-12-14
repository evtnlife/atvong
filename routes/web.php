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
//site routes
Auth::routes();

Route::get('/', 'siteController@index')->name('indexPrincipal');
Route::get('/contato', 'siteController@contato')->name('contato');
//album
Route::resource('/album', 'albumController');
Route::get('/album/{id}', 'albumController@show');
Route::get('/album/{id}/photo/add', 'photoController@index')->name('photoAdd');
Route::post('/album/photo/store', 'photoController@store')->name('photoStore');
Route::get('/album/{id}/delete', 'photoController@delete')->name('photoDelete');

// sobre routes
Route::resource('/sobre', 'sobreController');

// events routes
Route::resource('/eventos', 'eventsController');
Route::get('/eventos/{id}', 'eventsController@show');
Route::get('/eventos/select/view', 'eventsController@editView');
Route::get('/eventos/select/{id}/edit', 'eventsController@editShow');

//noticia routes
Route::resource('/noticias', 'NoticiasController');
Route::get('/noticias/{id}','NoticiasController@show');
Route::get('/noticias/select/view', 'NoticiasController@editView');
Route::get('/noticias/select/{id}/edit', 'NoticiasController@editShow');
Route::post('/noticias/select/{id}/store', 'NoticiasController@editStore')->name('newsEditStore');
Route::get('/noticias/select/{id}/delete', 'NoticiasController@delete')->name('deleteNoticia');

//rotas painel
Route::get('/painel', 'painelController@index')->name('painelIndex');

//rotas coursel
Route::resource('/coursel', 'courselController');

Route::get('/test', function (){
    return view('test');
});