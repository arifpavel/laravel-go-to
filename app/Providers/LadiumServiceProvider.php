<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\SettingsRepositoryInterface;
use App\Repositories\SettingsRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Config;

class LadiumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $interfaces = glob(app_path('/Repositories/Interfaces/*.php'));
        //  $i = 0;
        // foreach (glob(app_path('/Repositories/*.php')) as $filename) {
        //     //echo basename($interfaces[$i], '.php'). " " . basename($filename, '.php') . "\n";
        //     $interface = basename($interfaces[$i], '.php') . '::class';
        //     $repository = basename($filename, '.php'). '::class';
        //     $this->app->bind(
        //         $interface,
        //         $repository
        //     );
        //     $i++;
        // }
            $this->app->bind(
                UserRepositoryInterface::class,
                UserRepository::class
            );
            $this->app->bind(
                SettingsRepositoryInterface::class,
                SettingsRepository::class
            );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::after(function ($user, $ability) {
            return $user->hasRole('superadmin');
        });

        // Set settings table for config helper
        if (Schema::hasTable('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }
    }
}
