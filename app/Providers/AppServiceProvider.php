<?php

namespace Wempregada\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /** Models */
        $this->app->bind(
            'Wempregada\Repositories\Contracts\CidadeRepositoryInterface',
            'Wempregada\Repositories\Eloquent\CidadeRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\EstadoRepositoryInterface',
            'Wempregada\Repositories\Eloquent\EstadoRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\FinanceiroRepositoryInterface',
            'Wempregada\Repositories\Eloquent\FinanceiroRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\ItemRepositoryInterface',
            'Wempregada\Repositories\Eloquent\ItemRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\NewsletterRepositoryInterface',
            'Wempregada\Repositories\Eloquent\NewsletterRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\PaisRepositoryInterface',
            'Wempregada\Repositories\Eloquent\PaisRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\PlanoRepositoryInterface',
            'Wempregada\Repositories\Eloquent\PlanoRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\PlanoItemRepositoryInterface',
            'Wempregada\Repositories\Eloquent\PlanoItemRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\SexoRepositoryInterface',
            'Wempregada\Repositories\Eloquent\SexoRepository'
        );

        $this->app->bind(
            'Wempregada\Repositories\Contracts\UsuarioRepositoryInterface',
            'Wempregada\Repositories\Eloquent\UsuarioRepository'
        );
    }
}
