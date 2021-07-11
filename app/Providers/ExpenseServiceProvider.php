<?php

namespace App\Providers;

use App\Models\Expense;

class ExpenseServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * expense list
     * @return type
     */
    public function getExpenses() {
        try {
            $expenses = Expense::select(
                'id',
                'expenseDate',
                'workerId',
                'expenseName',
                'expenseDivision',
                'expenseCost',
                'expenseNote',
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['expenses' => $expenses];
                UserServiceProvider::$data['message'] = trans('messages.expenses_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create expense
     * @return type
     */
    public function createExpense($request) {
        try {
            $isExpenseCreated = Expense::insertGetId([
                'expenseDate'=>$request->expenseDate,
                'workerId'=>$request->workerId,
                'expenseName'=>$request->expenseName,
                'expenseDivision'=>$request->expenseDivision,
                'expenseCost'=>$request->expenseCost,
                'expenseNote'=>$request->expenseNote
            ]);
            if($isExpenseCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.expense_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * update expense
     * @return type
     */
    public function updateExpense($request){
        try{
            $isExpenseUpdated = Expense::where('id',$request->expenseId)->update([
                'expenseDate'=>$request->expenseDate,
                'workerId'=>$request->workerId,
                'expenseName'=>$request->expenseName,
                'expenseDivision'=>$request->expenseDivision,
                'expenseCost'=>$request->expenseCost,
                'expenseNote'=>$request->expenseNote
            ]);
            if($isExpenseUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.expense_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete expense
     * @return type
     */
    public function deleteExpense($request){
        try {
            $isExpenseUpdated = Expense::where('id',$request->expenseId)->delete();
            if($isExpenseUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.expense_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
