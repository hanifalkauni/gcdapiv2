<?php

namespace App\Providers;

use App\Models\CashFlow;

class CashFlowServiceProvider extends BaseApiServiceProvider
{
    public function __construct()
    {
    }

    /**
     * cashflow list
     * @return type
     */
    public function getCashFlow() {
        try {
            $cashflows = CashFlow::select(
                'id',
                'cashflowDate',
                'cashflowIncome',
                'cashflowExpense',
                'cashflowBalance'
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['cashflows' => $cashflows];
                UserServiceProvider::$data['message'] = trans('messages.cashflows_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create cashflow
     * @return type
     */
    public function createCashFlow($request) {
        try {
            $isCashFlowCreated = CashFlow::insertGetId([
                'cashflowDate'=>$request->cashflowDate,
                'cashflowIncome'=>$request->cashflowIncome,
                'cashflowExpense'=>$request->cashflowExpense,
                'cashflowBalance'=>$request->cashflowBalance
            ]);
            if($isCashFlowCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.cashflow_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update cashflow
     * @return type
     */
    public function updateCashFlow($request){
        try{
            $isCashFlowUpdated = CashFlow::where('id',$request->cashflowId)->update([
                'cashflowDate'=>$request->cashflowDate,
                'cashflowIncome'=>$request->cashflowIncome,
                'cashflowExpense'=>$request->cashflowExpense,
                'cashflowBalance'=>$request->cashflowBalance
            ]);
            if($isCashFlowUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.cashflow_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete cashflow
     * @return type
     */
    public function deleteCashFlow($request){
        try {
            $isCashFlowUpdated = CashFlow::where('id',$request->cashflowId)->delete();
            if($isCashFlowUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.cashflow_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
