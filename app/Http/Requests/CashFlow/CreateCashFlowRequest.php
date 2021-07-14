<?php

namespace App\Http\Requests\CashFlow;

use App\Http\Requests\BaseApiRequest;

class CreateCashFlowRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'cashflowDate'=>'required',
            'cashflowIncome' => 'required|numeric',
            'cashflowExpense' => 'required|numeric',
            'cashflowBalance' => 'required|numeric',
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
