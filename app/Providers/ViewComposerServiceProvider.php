<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],'App\Http\ViewComposers\MenuComposer');
        //estado
        View::composer('front.estado',function($view){
            $view->with('carritoCount',Cart::getContent()->count());
        }); 
            
            View::composer('front.resumen',function($view){
                $view->with('carritoCount',Cart::getContent()->count());
            });   
    }
}
