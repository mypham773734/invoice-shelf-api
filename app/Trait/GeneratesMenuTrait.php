<?php 

namespace App\Trait; 
use Lavary\Menu\Menu; 

trait GeneratesMenuTrait{
    public function getMenu($key, $currentUser){

        $newMenu = []; 
        $menuManager = app('menu'); 
        $menu = $menuManager->get($key); 

        $items = $menu ? $menu->items->toArray() : []; 
        foreach($items as $data){
            // Check checkAccess
            if(true){
                $newMenu[] = [
                    'title' => $data->title, 
                    'link' => $data->link->path['url'], 
                    'icon' => $data->data['icon'], 
                    'name' => $data->data['name'], 
                    'group' => $data->data['group'], 
                ]; 
            }
        }

        return $newMenu; 
    }
}