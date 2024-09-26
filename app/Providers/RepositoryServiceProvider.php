<?php

namespace App\Providers;

use App\Repositories\Interfaces\ManageUserRepositoryInterface;
use App\Repositories\ManageUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ManageUserRepositoryInterface::class, ManageUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
