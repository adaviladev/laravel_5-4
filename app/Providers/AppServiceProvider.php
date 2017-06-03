<?php

namespace App\Providers;

use App;
use App\Billing\Stripe;
use App\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function(View $view) {
            $archives = Post::archives();
            $tags = Tag::has('posts')->pluck('name');
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });

        // $stripe = App::make('App\Billing\Stripe');
    }
}
