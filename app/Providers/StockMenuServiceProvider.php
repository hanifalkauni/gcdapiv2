<?php

namespace App\Providers;

use App\Models\Stock_Menu;

class StockMenuServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * menus list
     * @return type
     */
    public function getStockMenus() {
        try {
            $stockmenus = Stock_Menu::select('id','outletId','menuId','stockMenuRemains')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['stockmenus' => $stockmenus];
                UserServiceProvider::$data['message'] = trans('messages.stock_menus_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create menu
     * @return type
     */
    public function createStockMenu($request) {
        try {
            $isStockMenuCreated = Stock_Menu::insertGetId([
                'outletId'=>$request->outletId,
                'menuId'=>$request->menuId,
                'stockMenuRemains'=>$request->stockMenuRemains
                ]);
            if($isStockMenuCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.stock_menu_created');
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
    public function updateStockMenu($request){
        try{
            $isStockMenuUpdated = Stock_Menu::where('id',$request->stockMenuId)->update([
                'outletId'=>$request->outletId,
                'menuId'=>$request->menuId,
                'stockMenuRemains'=>$request->stockMenuRemains
            ]);
            if($isStockMenuUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.stock_menu_updated');
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
    public function deleteStockMenu($request){
        try {
            $isStockMenuUpdated = Stock_Menu::where('id',$request->stockMenuId)->delete();
            if($isStockMenuUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.stock_menu_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
