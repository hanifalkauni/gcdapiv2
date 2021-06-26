<?php

namespace App\Providers;

use App\Models\Menu;

class MenuServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * menus list
     * @return type
     */
    public function getMenus() {
        try {
            $menus = Menu::select('id','menuName','menuPrice')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['menus' => $menus];
                UserServiceProvider::$data['message'] = trans('messages.menus_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create menu
     * @return type
     */
    public function createMenu($request) {
        try {
            $isMenuCreated = Menu::insertGetId([
                'menuName'=>$request->menuName,
                'menPrice'=>$request->menuPrice,
                ]);
            if($isMenuCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.menu_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update menu
     * @return type
     */
    public function updateMenu($request){
        try{
            $isMenuUpdated = Menu::where('id',$request->menuId)->update([
                'menuName'=>$request->menuName,
                'menPrice'=>$request->menuPrice
            ]);
            if($isMenuUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.menu_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete menu
     * @return type
     */
    public function deleteMenu($request){
        try {
            $isMenuUpdated = Menu::where('id',$request->menuId)->delete();
            if($isMenuUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.menu_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
