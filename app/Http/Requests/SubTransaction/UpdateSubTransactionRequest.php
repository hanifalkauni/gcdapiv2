<?php

namespace App\Http\Requests\SubTransaction;

use App\Http\Requests\BaseApiRequest;

class UpdateSubTransactionRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'subTransactionId'=>'required|integer',
            'transactionId' => 'required|integer',
            'subTransactionName' => 'required|string',
            'subTransactionQuantity' => 'required|numeric',
            'subTransactionTotal'=>'required|numeric'
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
