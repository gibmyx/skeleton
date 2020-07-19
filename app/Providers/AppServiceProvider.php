<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Skeleton\Services\Application\Container\Contracts\Container;
use Skeleton\Services\Application\Container\LaravelContainer;

use Skeleton\Services\Domain\Bus\CommandBus;
use Skeleton\Services\Infrastructure\Bus\SimpleCommandBus;

use Skeleton\App\Usuarios\Domain\Repository\UsuarioRepository;
use Skeleton\App\Usuarios\Infrastructure\Eloquent\UsuarioEloquentRepository;

use Skeleton\App\Authorization\Domain\Repository\ClienteHttpRepository;
use Skeleton\App\Authorization\Infrastructure\ClientHtttp\GuzzleHttpReposiroty;

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

        $this->app->bind(
            ClienteHttpRepository::class,
            GuzzleHttpReposiroty::class
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
