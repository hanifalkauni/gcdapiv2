<?php

namespace App\Http\Controllers;

use App\Http\Requests\Outlet\DeleteOutletRequest;
use App\Http\Requests\Outlet\UpdateOutletRequest;
use App\Http\Requests\Outlet\CreateOutletRequest;
use App\Providers\OutletServiceProvider;

class OutletController extends BaseApiController
{
    public $outletServiceProvider;
    public function __construct()
    {
        $this->outletServiceProvider = new OutletServiceProvider();
    }

    public function get() {
        $result = $this->outletServiceProvider->getOutlets();
        return $this->returnResponse($result);
    }

    public function create(CreateOutletRequest $request){
        $result = $this->outletServiceProvider->createOutlet($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateOutletRequest $request){
        $result = $this->outletServiceProvider->updateOutlet($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteOutletRequest $request){
        $result = $this->outletServiceProvider->deleteOutlet($request);
        return $this->returnResponse($result);
    }
}
