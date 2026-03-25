<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Lavary\Menu\Menu;
use App\Space\InstallUtils; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('menu', function ($app) {
            return new Menu;
        });

        if (InstallUtils::isDbCreated()) {
            $this->addMenus();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public function addMenus(){
        // Main Menu
        $menuManager = app('menu');
        $menuManager->make('main_menu', function ($menu) {
            foreach (config('invoiceshelf.main_menu') as $data) {
                $this->generateMenu($menu, $data);
            }
        });


        // Setting Menu

        $menuManager->make('setting_menu', function ($menu){
            foreach (config('invoiceshelf.setting_menu') as $data) {
                $this->generateMenu($menu, $data);
            }
        }); 
    }

    public function generateMenu($menu, $item)
    {
        $menu->add($item['title'], $item['link'])
            ->data('icon', $item['icon'])
            ->data('name', $item['name'])
            ->data('owner_only', $item['owner_only'])
            ->data('ability', $item['ability'])
            ->data('model', $item['model']) 
            ->data('group', $item['group']); 
    }
}
