<?php

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('plano', ['as' => 'plano.index', 'uses' => 'PlanoController@index']);

Route::get('contato', ['as' => 'contato.index', 'uses' => 'ContatoController@index']);
Route::post('contato/store', ['as' => 'contato.store', 'uses' => 'ContatoController@store']);

Route::group(['prefix' => 'usuario'], function()
{
    Route::get('resgistrar/', ['as' => 'usuario.create', 'uses' => 'UserController@create']);
    Route::get('resgistrar/{id}', ['as' => 'usuario.create', 'uses' => 'UserController@create']);
    Route::post('store', ['as' => 'usuario.store', 'uses' => 'UserController@store']);
    Route::get('login', ['as' => 'usuario.login', 'uses' => 'UserController@login']);
    Route::post('logar', ['as' => 'usuario.logar', 'uses' => 'UserController@logar']);
    Route::get('confirmar/{hash}', ['as' => 'users.confirmar', 'uses' => 'UserController@confirmar']);
});

Route::post('newsletter', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);

Route::get('auth/login', function(){
    return redirect('usuario/login');
});

//AJAX
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::post('ajax/comboCidadePorEstado', 'AjaxController@comboCidadePorEstado');
