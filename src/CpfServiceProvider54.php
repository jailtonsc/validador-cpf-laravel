<?php

namespace ValidadorCpf;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use ValidadorCpf\Validation\CpfValidation54;

class CpfServiceProvider54 extends ServiceProvider
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

        Validator::extend('cpf', function ($attribute, $value, $parameters, $validator) {
            return (new CpfValidation54($value))->validarCpf();
        }, config('cpf.message'));

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
