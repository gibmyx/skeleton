<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use LaravelDoctrine\ORM\Facades\EntityManager;
use Skeleton\App\Categorias\Application\UseCases\GetCategoriaUserCases;
use Doctrine\Common\Persistence\ObjectRepository;
use Skeleton\App\Categorias\Domain\Entities\Categoria;
use Skeleton\App\Categorias\Infrastructure\Doctrine\CategoriaDoctrineRepository;

use Skeleton\App\Articulos\Domain\Repository\ArticuloRepository;
use Skeleton\App\Articulos\Infrastructure\Eloquent\ArticuloEloquentRepository;
use Skeleton\App\Categorias\Domain\Repository\CategoriaRepository;
use Skeleton\App\Categorias\Infrastructure\Eloquent\CategoriaEloquentRepository;
use Skeleton\App\Proveedores\Domain\Repository\ProveedorRepository;
use Skeleton\App\Proveedores\Infrastructure\Eloquent\ProveedorEloquentRepository;
use Skeleton\Shared\Application\Container\Contracts\Container;
use Skeleton\Shared\Application\Container\LaravelContainer;

use Skeleton\Shared\Domain\Bus\CommandBus;
use Skeleton\Shared\Infrastructure\Bus\SimpleCommandBus;

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

        $this->app->bind(CategoriaRepository::class, function(){
            return new CategoriaDoctrineRepository(
                EntityManager::getRepository(Categoria::class)
            );
        });

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
            ArticuloRepository::class,
            ArticuloEloquentRepository::class
        );

//        $this->app->bind(
//            CategoriaRepository::class,
//            CategoriaEloquentRepository::class
//        );


        $this->app->bind(
            ProveedorRepository::class,
            ProveedorEloquentRepository::class
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
