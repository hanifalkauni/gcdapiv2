<?php

namespace App\Http\Requests\Expense;

use App\Http\Requests\BaseApiRequest;

class DeleteExpenseRequest extends BaaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'expenseId'=>'required|integer'
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
