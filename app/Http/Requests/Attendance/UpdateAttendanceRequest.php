<?php

namespace App\Http\Requests\Attendance;

use App\Http\Requests\BaseApiRequest;


class UpdateAttendanceRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'attendanceId'=>'required|integer',
            'outletId'=>'required|integer',
            'workerId'=>'required|integer',
            'attendanceDate'=>'required',
            'attendanceShift'=>'required',
            'attendanceIncome'=>'required',
            'attendanceExpense'=>'required',
            'attendanceOmset'=>'required',
            'attendanceCheckIn'=>'required',
            'attendanceCheckOut'=>'required',
            'attendanceMessage'=>'required',
            'attendanceNote'=>'required'

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
