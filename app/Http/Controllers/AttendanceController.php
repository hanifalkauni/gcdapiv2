<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attendance\DeleteAttendanceRequest;
use App\Http\Requests\Attendance\UpdateAttendanceRequest;
use App\Http\Requests\Attendance\CreateAttendanceRequest;
use App\Providers\AttendanceServiceProvider;

class AttendanceController extends BaseApiController
{
    public $attendanceServiceProvider;
    public function __construct()
    {
        $this->attendanceServiceProvider = new AttendanceServiceProvider();
    }

    public function get() {
        $result = $this->attendanceServiceProvider->getAttendances();
        return $this->returnResponse($result);
    }

    public function create(CreateAttendanceRequest $request){
        $result = $this->attendanceServiceProvider->createAttendance($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateAttendanceRequest $request){
        $result = $this->attendanceServiceProvider->updateAttendance($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteAttendanceRequest $request){
        $result = $this->attendanceServiceProvider->deleteAttendance($request);
        return $this->returnResponse($result);
    }
}
