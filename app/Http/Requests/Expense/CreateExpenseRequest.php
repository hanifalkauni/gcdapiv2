<?php

namespace App\Http\Requests\Expense;

use App\Http\Request\BaseApiRequest;

class CreateExpenseRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'expenseDate' => 'required',
            'workerId' => 'required|integer',
            'expenseName' => 'required|string',
            'expenseDivision'=>'required|string',
            'expenseCost'=>'required|numeric'
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
}
