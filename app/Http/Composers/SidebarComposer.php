<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Services\MenuService;

class SidebarComposer {


    public $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuService', $this->menuService);


    }

}