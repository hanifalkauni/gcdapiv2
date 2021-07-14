<?php

namespace App\Http\Requests\Attendance;

use App\Http\Requests\BaseApiRequest;

class DeleteAttendanceRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'attendanceId'=>'required|integer'
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
