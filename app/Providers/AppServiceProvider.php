<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('is_admin', static function (User $user): bool {
            return $user->isAdmin();
        });

        Gate::define('is_owner', static function (User $user, mixed $resource): bool {
            return $user->isOwner($resource);
        });
    }
}
