<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\DeleteTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Providers\TransactionServiceProvider;

class TransactionController extends BaseApiController
{
    public $transactionServiceProvider;
    public function __construct()
    {
        $this->transactionServiceProvider = new TransactionServiceProvider();
    }

    public function get() {
        $result = $this->transactionServiceProvider->getTransactions();
        return $this->returnResponse($result);
    }

    public function create(CreateTransactionRequest $request){
        $result = $this->transactionServiceProvider->createTransaction($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateTransactionRequest $request){
        $result = $this->transactionServiceProvider->updateTransaction($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteTransactionRequest $request){
        $result = $this->transactionServiceProvider->deleteTransaction($request);
        return $this->returnResponse($result);
    }
}
