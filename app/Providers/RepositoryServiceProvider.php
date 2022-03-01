<?php

namespace App\Providers;
use App\Models\User;


//Authentication
use Illuminate\Support\ServiceProvider;

use App\Repositories\Users\UsersRepository;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Authentication\AuthenticationRepository;
use App\Repositories\Authentication\AuthenticationRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(AuthenticationRepositoryInterface::class, function($App) 
        {
            return new AuthenticationRepository(User::class);
        });

        $this->app->singleton(UsersRepositoryInterface::class, function($App) 
        {
            return new UsersRepository(User::class);
        });

      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
