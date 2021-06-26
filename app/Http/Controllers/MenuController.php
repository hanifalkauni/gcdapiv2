<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Requests\CreateMenuRequest;
use App\Providers\MenuServiceProvider;

class MenuController extends BaseApiController
{
    public $menuServiceProvider;
    public function __construct()
    {
        $this->menuServiceProvider = new MenuServiceProvider();
    }

    public function get() {
        $result = $this->menuServiceProvider->getMenus();
        return $this->returnResponse($result);
    }

    public function create(CreateMenuRequest $request){
        $result = $this->menuServiceProvider->createMenu($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateMenuRequest $request){
        $result = $this->menuServiceProvider->updateMenu($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteMenuRequest $request){
        $result = $this->menuServiceProvider->deleteMenu($request);
        return $this->returnResponse($result);
    }
}
