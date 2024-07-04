<?php

namespace App\Providers;

use App\Models\Place;
use App\Observers\PlaceObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\LocationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->singleton(LocationService::class, function ($app) {
          return new LocationService();
      });
  }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Paginator::useBootstrapFive();
      Place::observe(PlaceObserver::class);
    }
}
