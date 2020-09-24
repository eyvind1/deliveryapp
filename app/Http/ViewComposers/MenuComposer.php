<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Categorias;

class MenuComposer
{
    /**
     * Register services.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Categorias::wherePortada(1)->get(['slug','nombre']);
        $view->with('menu',$menu);
    }

    
}