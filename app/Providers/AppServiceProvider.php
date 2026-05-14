<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        $this->configureDefaults();

        // Share unread contact count globally with the admin layout
        \Illuminate\Support\Facades\View::composer('admin.layouts.app', function ($view) {
            // Prevent exceptions if migrations haven't run yet
            try {
                $unreadCount = \Schema::hasTable('contacts') 
                    ? \App\Models\Contact::where('is_read', false)->count() 
                    : 0;
                $view->with('unreadCount', $unreadCount);
            } catch (\Exception $e) {
                $view->with('unreadCount', 0);
            }
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
