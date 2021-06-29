<?php

namespace App\Http\Requests\CashFlow;

use App\Http\Request\BaseApiRequest;

class DeleteCashFlowRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'cashflowId'=>'required|integer',
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
