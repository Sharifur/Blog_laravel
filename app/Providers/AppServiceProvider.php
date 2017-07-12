<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Admin;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        
//        View::composer('backend.master',function($view){
//            $admin = Admin::where('admin_type','admin')->first();
//            $sadmin = $admin->admin_type;
//            $view->with(['admin' => $sadmin]);
//        });
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
