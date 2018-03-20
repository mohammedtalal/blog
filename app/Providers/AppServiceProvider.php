<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Schema;
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
        // Specified key was too long error, Laravel News post:
        Schema::defaultStringLength(191);

        // this to passing data to multiple views in project
        view()->composer('layouts.sidebar', function ($view) {
            $archives = \App\Post::archives();
            $tags     = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
