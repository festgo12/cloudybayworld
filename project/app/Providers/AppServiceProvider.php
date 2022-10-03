<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot()
    {
    
        Paginator::useBootstrap();

        view()->composer('*',function($settings){

            $settings->with('gs', cache()->remember('generalsettings', now()->addDay(), function () {
                return DB::table('generalsettings')->first();
            }));


            $settings->with('categories', cache()->remember('categories', now()->addDay(), function () {
                return Category::with('subs')->where('status','=',1)->get();
            }));

            
           

        });
    }
}
