<?php

namespace ValidadorCpf;

use Illuminate\Support\ServiceProvider;
use ValidadorCpf\Validation\Cpf;

class CpfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new Cpf( $translator, $data, $rules, $messages, $customAttributes );
        } );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
