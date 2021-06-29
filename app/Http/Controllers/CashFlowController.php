<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashFlow\DeleteCashFlowRequest;
use App\Http\Requests\CashFlow\UpdateCashFlowRequest;
use App\Http\Requests\CashFlow\CreateCashFlowRequest;
use App\Providers\CashFlowServiceProvider;

class CashFlowController extends BaseApiController
{
    public $cashFlowServiceProvider;
    public function __construct()
    {
        $this->cashFlowServiceProvider = new CashFlowServiceProvider();
    }

    public function get() {
        $result = $this->cashFlowServiceProvider->getCashFlows();
        return $this->returnResponse($result);
    }

    public function create(CreateCashFlowRequest $request){
        $result = $this->cashFlowServiceProvider->createCashFlow($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateACashFlowRequest $request){
        $result = $this->cashFlowServiceProvider->updateCashFlow($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteCashFlowRequest $request){
        $result = $this->cashFlowServiceProvider->deleteCashFlow($request);
        return $this->returnResponse($result);
    }
}
