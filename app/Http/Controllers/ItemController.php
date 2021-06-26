<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\DeleteItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Requests\Item\CreateItemRequest;
use App\Providers\ItemServiceProvider;

class ItemController extends BaseApiController
{
    public $itemServiceProvider;
    public function __construct()
    {
        $this->itemServiceProvider = new ItemServiceProvider();
    }

    public function get() {
        $result = $this->itemServiceProvider->getItems();
        return $this->returnResponse($result);
    }

    public function create(CreateItemRequest $request){
        $result = $this->itemServiceProvider->createItem($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateItemRequest $request){
        $result = $this->itemServiceProvider->updateItem($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteItemRequest $request){
        $result = $this->itemServiceProvider->deleteItem($request);
        return $this->returnResponse($result);
    }
}
