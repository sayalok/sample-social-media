<?php

namespace App\Providers;
use App\Models\Post;


//Authentication
use App\Models\User;

use App\Models\Pages;
use App\Models\PagePost;
use App\Models\PagesFollowers;
use App\Models\PersonFollowers;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Post\PostRepository;
use App\Repositories\Pages\PagesRepository;
use App\Repositories\Users\UsersRepository;
use App\Repositories\PagePost\PagePostRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Pages\PagesRepositoryInterface;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\PagePost\PagePostRepositoryInterface;
use App\Repositories\Authentication\AuthenticationRepository;
use App\Repositories\PagesFollowers\PagesFollowersRepository;
use App\Repositories\PersonFollowers\PersonFollowersRepository;
use App\Repositories\Authentication\AuthenticationRepositoryInterface;
use App\Repositories\PagesFollowers\PagesFollowersRepositoryInterface;
use App\Repositories\PersonFollowers\PersonFollowersRepositoryInterface;


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

        $this->app->singleton(PersonFollowersRepositoryInterface::class, function($App) 
        {
            return new PersonFollowersRepository(PersonFollowers::class);
        });

        $this->app->singleton(PostRepositoryInterface::class, function($App) 
        {
            return new PostRepository(Post::class);
        });

        $this->app->singleton(PagePostRepositoryInterface::class, function($App) 
        {
            return new PagePostRepository(PagePost::class);
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
