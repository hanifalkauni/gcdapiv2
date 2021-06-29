<?php

namespace App\Providers;

use App\Models\Sub_Transaction;

class SubTransactionServiceProvider extends BaseApiServiceProvider
{
    public function __construct()
    {
    }

    /**
     * subtransaction list
     * @return type
     */
    public function getSubTransactions() {
        try {
            $subtransactions = Sub_Transaction::select(
                'id',
                'attendaceId',
                'transactionType',
                'transactionTotal',
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['subtransactions' => $subtransactions];
                UserServiceProvider::$data['message'] = trans('messages.sub_transactions_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create subtransaction
     * @return type
     */
    public function createSubTransaction($request) {
        try {
            $isSubTransactionCreated = Sub_Transaction::insertGetId([
                'attendaceId'=>$request->attendaceId,
                'transactionType'=>$request->transactionType,
                'transactionTotal'=>$request->transactionTotal,
            ]);
            if($isSubTransactionCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.sub_transaction_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update subtransaction
     * @return type
     */
    public function updateSubTransaction($request){
        try{
            $isSubTransactionUpdated = Sub_Transaction::where('id',$request->subTransactionId)->update([
                'attendaceId'=>$request->attendaceId,
                'transactionType'=>$request->transactionType,
                'transactionTotal'=>$request->transactionTotal,
            ]);
            if($isSubTransactionUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.sub_transaction_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete subtransaction
     * @return type
     */
    public function deleteSubTransaction($request){
        try {
            $isSubTransactionUpdated = Sub_Transaction::where('id',$request->subTransactionId)->delete();
            if($isSubTransactionUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.sub_transaction_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
