<?php

namespace ValidadorCpf;

use Illuminate\Support\ServiceProvider;
use ValidadorCpf\Validation\CpfValidation;

class CpfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('cpf.php'),
        ]);


        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new CpfValidation( $translator, $data, $rules, $messages, $customAttributes );
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
