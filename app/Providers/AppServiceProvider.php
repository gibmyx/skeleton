<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Skeleton\Usuarios\Application\Container\Contracts\Container;
use Skeleton\Usuarios\Application\Container\LaravelContainer;
use Skeleton\Usuarios\Domain\Bus\CommandBus;
use Skeleton\Usuarios\Domain\Repository\UsuarioRepository;
use Skeleton\Usuarios\Infrastructure\Bus\SimpleCommandBus;
use Skeleton\Usuarios\Infrastructure\Eloquent\UsuarioEloquentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommandBus::class,
            SimpleCommandBus::class
        );

        $this->app->bind(
            Container::class,
            LaravelContainer::class
        );

        $this->app->bind(
            UsuarioRepository::class,
            UsuarioEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
