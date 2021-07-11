<?php

namespace App\Providers;

use App\Models\Transaction;

class TransactionServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * transaction list
     * @return type
     */
    public function getTransactions() {
        try {
            $transactions = Transaction::select(
                'id',
                'attendaceId',
                'transactionType',
                'transactionTotal',
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['transactions' => $transactions];
                UserServiceProvider::$data['message'] = trans('messages.transactions_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create transaction
     * @return type
     */
    public function createTransaction($request) {
        try {
            $isTransactionCreated = Transaction::insertGetId([
                'attendaceId'=>$request->attendaceId,
                'transactionType'=>$request->transactionType,
                'transactionTotal'=>$request->transactionTotal,
            ]);
            if($isTransactionCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.transaction_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update transaction
     * @return type
     */
    public function updateTransaction($request){
        try{
            $isTransactionUpdated = Transaction::where('id',$request->transactionId)->update([
                'attendaceId'=>$request->attendaceId,
                'transactionType'=>$request->transactionType,
                'transactionTotal'=>$request->transactionTotal,
            ]);
            if($isTransactionUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.transaction_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete transaction
     * @return type
     */
    public function deleteTransaction($request){
        try {
            $isTransactionUpdated = Transaction::where('id',$request->transactionId)->delete();
            if($isTransactionUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.transaction_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
