<?php

namespace App\Http\Requests\Transaction;

use App\Http\Requests\BaseApiRequest;

class UpdateTransactionRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'transactionId'=>'required|integer',
            'attendanceId' => 'required|integer',
            'transactionType' => 'required',
            'transactionTotal' => 'required|numeric'
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
