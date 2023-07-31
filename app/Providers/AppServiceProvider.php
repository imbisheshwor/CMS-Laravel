<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\CustomPostTypeInterface;
use App\Repository\CustomPostTypeRepository;
use App\Repository\EntityInterface;
use App\Repository\EntityRepository;
use App\Repository\StoreInterface;
use App\Repository\StoreRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomPostTypeInterface::class,CustomPostTypeRepository::class);
        $this->app->bind(EntityInterface::class,EntityRepository::class);
        $this->app->bind(StoreInterface::class,StoreRepository::class);
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
