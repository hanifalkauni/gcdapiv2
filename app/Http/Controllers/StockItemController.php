<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockItem\DeleteStockItemRequest;
use App\Http\Requests\StockItem\UpdateStockItemRequest;
use App\Http\Requests\StockItem\CreateStockItemRequest;
use App\Providers\StockItemServiceProvider;

class StockItemController extends BaseApiController
{
    public $stockItemServiceProvider;
    public function __construct()
    {
        $this->stockItemServiceProvider = new StockItemServiceProvider();
    }

    public function get() {
        $result = $this->stockItemServiceProvider->getStockItems();
        return $this->returnResponse($result);
    }

    public function create(CreateStockItemRequest $request){
        $result = $this->stockItemServiceProvider->createStockItem($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateStockItemRequest $request){
        $result = $this->stockItemServiceProvider->updateStockItem($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteStockItemRequest $request){
        $result = $this->stockItemServiceProvider->deleteStockItem($request);
        return $this->returnResponse($result);
    }
}
