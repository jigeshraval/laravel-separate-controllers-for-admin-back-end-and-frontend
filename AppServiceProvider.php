<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $path_array = $request->segments();
        $admin_route = config('app.admin_route');
        
        //If URL path is having "admin" then mark the current scope as Admin
        if (in_array($admin_route, $path_array)) {
            config(['app.app_scope' => 'admin']); 
        }
    }
}
