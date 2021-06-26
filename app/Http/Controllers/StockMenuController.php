<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockMenu\DeleteStockMenuRequest;
use App\Http\Requests\StockMenu\UpdateStockMenuRequest;
use App\Http\Requests\StockMenu\CreateStockMenuRequest;
use App\Providers\StockMenuServiceProvider;

class StockMenuController extends BaseApiController
{
    public $stockMenuServiceProvider;
    public function __construct()
    {
        $this->stockMenuServiceProvider = new StockMenuServiceProvider();
    }

    public function get() {
        $result = $this->stockMenuServiceProvider->getStockMenus();
        return $this->returnResponse($result);
    }

    public function create(CreateStockMenuRequest $request){
        $result = $this->stockMenuServiceProvider->createStockMenu($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateStockMenuRequest $request){
        $result = $this->stockMenuServiceProvider->updateStockMenu($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteStockMenuRequest $request){
        $result = $this->stockMenuServiceProvider->deleteStockMenu($request);
        return $this->returnResponse($result);
    }
}
