<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use App\Events\PostCreated;
use App\Listeners\SendPostCreatedLog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Event::listen(PostCreated::class, SendPostCreatedLog::class); // "когда произойдёт PostCreated — вызови SendPostCreatedLog"
    }
}
