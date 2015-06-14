<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('plano', ['as' => 'plano.index', 'uses' => 'PlanoController@index']);

Route::get('contato', ['as' => 'contato.index', 'uses' => 'ContatoController@index']);
Route::post('contato/store', ['as' => 'contato.store', 'uses' => 'ContatoController@store']);

Route::get('usuario/resgistrar/', ['as' => 'usuario.create', 'uses' => 'UserController@create']);
Route::get('usuario/resgistrar/{id}', ['as' => 'usuario.create', 'uses' => 'UserController@create']);
Route::post('usuario/store', ['as' => 'usuario.store', 'uses' => 'UserController@store']);
Route::get('usuario/login', ['as' => 'usuario.login', 'uses' => 'UserController@login']);
Route::post('usuario/logar', ['as' => 'usuario.logar', 'uses' => 'UserController@logar']);
Route::get('usuario/confirmar/{hash}', ['as' => 'users.confirmar', 'uses' => 'UserController@confirmar']);

Route::post('newsletter', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);

Route::get('auth/login', function(){
    return redirect('usuario/login');
});


//phpinfo
/*
Route::get('phpinfo', function (){
    phpinfo();
});
*/

//AJAX
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::post('ajax/comboCidadePorEstado', 'AjaxController@comboCidadePorEstado');