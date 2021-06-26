<?php

namespace App\Providers;

use App\Models\Item;

class ItemServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * items list
     * @return type
     */
    public function getItems() {
        try {
            $items = Item::select('id','itemName','itemUnitOfQuantity')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['items' => $items];
                UserServiceProvider::$data['message'] = trans('messages.items_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create item
     * @return type
     */
    public function createItem($request) {
        try {
            $isItemCreated = Item::insertGetId([
                'itemName'=>$request->itemName,
                'itemUnitOfQuantity'=>$request->itemUnitOfQuantity,
                ]);
            if($isItemCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.item_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update item
     * @return type
     */
    public function updateItem($request){
        try{
            $isItemUpdated = Item::where('id',$request->itemId)->update([
                'itemName'=>$request->itemName,
                'itemUnitOfQuantity'=>$request->itemUnitOfQuantity,
                ]);
            if($isItemUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.item_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete item
     * @return type
     */
    public function deleteItem($request){
        try {
            $isItemUpdated = Item::where('id',$request->itemId)->delete();
            if($isItemUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.item_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
