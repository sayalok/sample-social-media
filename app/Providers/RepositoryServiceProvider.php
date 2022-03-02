<?php

namespace App\Providers;
use App\Models\User;


//Authentication
use App\Models\Pages;

use App\Models\PagesFollowers;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Pages\PagesRepository;
use App\Repositories\Users\UsersRepository;
use App\Repositories\Pages\PagesRepositoryInterface;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Authentication\AuthenticationRepository;
use App\Repositories\PagesFollowers\PagesFollowersRepository;
use App\Repositories\Authentication\AuthenticationRepositoryInterface;
use App\Repositories\PagesFollowers\PagesFollowersRepositoryInterface;


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

        $this->app->singleton(PagesRepositoryInterface::class, function($App) 
        {
            return new PagesRepository(Pages::class);
        });

        $this->app->singleton(PagesFollowersRepositoryInterface::class, function($App) 
        {
            return new PagesFollowersRepository(PagesFollowers::class);
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
