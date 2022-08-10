<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Menu;
use App\Models\Menuitems;
use App\Models\Itemcategory;
use App\Models\Newscategory;
use App\Models\Config;
use App\Models\Fanpage;
use App\Models\Map;
use View;
use Cart;

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
    	view()->composer('frontend.index', function($view){
    		$menu = Menu::orderBy('id', 'DESC')->where(['location' => 1, 'status' => 1])->first();
    		$config = Config::orderBy('id', 'DESC')->first();
    		$itemcategory = Itemcategory::where('status', 1)->get();
    		$newscategory = Newscategory::where('status', 1)->get();
    		$listitem = Menuitems::where('menu_id', $menu->id)->get();
    		$fanpage = Fanpage::first();
    		$map = Map::first();
    		$countCart = Cart::count();
    		$view->with(compact('menu', 'itemcategory', 'newscategory', 'listitem', 'config', 'fanpage', 'map', 'countCart'));
    	});

    }
  }
