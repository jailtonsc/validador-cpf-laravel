<?php

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('plano', ['as' => 'plano.index', 'uses' => 'PlanoController@index']);

Route::get('contato', ['as' => 'contato.index', 'uses' => 'ContatoController@index']);
Route::post('contato/store', ['as' => 'contato.store', 'uses' => 'ContatoController@store']);

Route::group(['prefix' => 'usuario'], function () {
    Route::get('resgistrar', ['as' => 'usuario.create', 'uses' => 'UsuarioController@create']);
    Route::get('resgistrar/{id}', ['uses' => 'UsuarioController@create']);
    Route::post('store', ['as' => 'usuario.store', 'uses' => 'UsuarioController@store']);
    Route::get('confirmar/{hash}', ['as' => 'users.confirmar', 'uses' => 'UsuarioController@confirmar']);
});

// Authentication routes...
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/*
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    Route::post('logar', ['as' => 'auth.logar', 'uses' => 'AuthController@logar']);
    Route::get('esqueci-senha', ['as' => 'auth.senha', 'uses' => 'AuthController@esqueciSenha']);
});
*/


Route::post('newsletter', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);






/** AJAX */
Route::post('cidade/combo-cidade-por-estado', [
    'as' => 'cidade.combo',
    'uses' => 'CidadeController@getComboDeCidadePorEstado'
]);
