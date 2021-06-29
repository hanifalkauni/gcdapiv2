<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTransaction\DeleteTransactionRequest;
use App\Http\Requests\SubTransaction\UpdateTransactionRequest;
use App\Http\Requests\SubTransaction\CreateTransactionRequest;
use App\Providers\SubTransactionServiceProvider;

class SubTransactionController extends BaseApiController
{
    public $subtransactionServiceProvider;
    public function __construct()
    {
        $this->subtransactionServiceProvider = new SubTransactionServiceProvider();
    }

    public function get() {
        $result = $this->subtransactionServiceProvider->getSubTransactions();
        return $this->returnResponse($result);
    }

    public function create(CreateTransactionRequest $request){
        $result = $this->subtransactionServiceProvider->createSubTransaction($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateTransactionRequest $request){
        $result = $this->subtransactionServiceProvider->updateSubTransaction($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteTransactionRequest $request){
        $result = $this->subtransactionServiceProvider->deleteSubTransaction($request);
        return $this->returnResponse($result);
    }
}
