<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('general_settings')) {
             $setting = \DB::table("general_settings")->first();
             if(isset($setting)){
                 view()->composer('admin.partials.header',function($view){
                        $view->with('settings',$setting = \DB::table("general_settings")->first());
                    });
             }
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
