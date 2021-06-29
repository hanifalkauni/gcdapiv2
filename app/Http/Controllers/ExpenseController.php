<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\DeleteExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Requests\Expense\CreateExpenseRequest;
use App\Providers\ExpenseServiceProvider;

class ExpenseController extends BaseApiController
{
    public $expenseServiceProvider;
    public function __construct()
    {
        $this->expenseServiceProvider = new ExpenseServiceProvider();
    }

    public function get() {
        $result = $this->expenseServiceProvider->getExpenses();
        return $this->returnResponse($result);
    }

    public function create(CreateExpenseRequest $request){
        $result = $this->expenseServiceProvider->createExpense($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateExpenseRequest $request){
        $result = $this->expenseServiceProvider->updateExpense($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteExpenseRequest $request){
        $result = $this->expenseServiceProvider->deleteExpense($request);
        return $this->returnResponse($result);
    }
}
