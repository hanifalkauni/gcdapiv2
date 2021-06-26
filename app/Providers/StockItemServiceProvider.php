<?php

namespace App\Providers;

use App\Models\Stock_Item;

class StockItemServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * stock items list
     * @return type
     */
    public function getStockItems() {
        try {
            $stockitems = Stock_Item::select(
                'id','outletId','itemId','stockItemDate','stockItemRemains'
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['stockitems' => $stockitems];
                UserServiceProvider::$data['message'] = trans('messages.stock_items_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create stock item
     * @return type
     */
    public function createStockItem($request) {
        try {
            $isStockItemCreated = Stock_Item::insertGetId([
                'outletId'=>$request->outletId,
                'itemId'=>$request->itemId,
                'stockItemDate'=>$request->stockItemDate,
                'stockItemRemains'=>$request->stockItemRemains
                ]);
            if($isStockItemCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.stock_item_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update stock item
     * @return type
     */
    public function updateStockItem($request){
        try{
            $isStockItemUpdated = Stock_Item::where('id',$request->stockItemId)->update([
                'outletId'=>$request->outletId,
                'itemId'=>$request->itemId,
                'stockItemDate'=>$request->stockItemDate,
                'stockItemRemains'=>$request->stockItemRemains
            ]);
            if($isStockItemUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.stock_item_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete stock item
     * @return type
     */
    public function deleteStockItem($request){
        try {
            $isStockItemUpdated = Stock_Item::where('id',$request->stockItemId)->delete();
            if($isStockItemUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.stock_item_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
