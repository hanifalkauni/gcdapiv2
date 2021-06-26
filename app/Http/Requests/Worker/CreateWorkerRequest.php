<?php

namespace App\Http\Requests\Worker;


class CreateWorkerRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'workerIdentity' => 'required',
            'workerName'=>'required|string',
            'workerPhone'=>'required|numeric',
            'workerEmail'=>'required',
            'workerIdPosition'=>'required|numeric',
            'workerDateEntry'=>'required|date'
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
