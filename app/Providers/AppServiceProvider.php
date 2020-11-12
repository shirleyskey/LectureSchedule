<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        try {
            if (Schema::hasTable('settings')) {
                $settings = Setting::pluck('value', 'key')->toArray();
                if (isset($settings['media_lock'])) {
                    if ($settings['media_lock'] == 'false') {
                        \Config::set(["elfinder.root_options.attributes.0.locked" => false]);
                    }else{
                        \Config::set(["elfinder.root_options.attributes.0.locked" => true]);
                    }
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            app('log')->error($e->getMessage());
        }
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
