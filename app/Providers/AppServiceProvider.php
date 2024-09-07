<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\FoodItem;
use App\Policies\FoodItemPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        FoodItem::class => FoodItemPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any application services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
