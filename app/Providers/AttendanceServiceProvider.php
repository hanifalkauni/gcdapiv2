<?php

namespace App\Providers;

use App\Models\Attendance;

class AttendanceServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * attendance list
     * @return type
     */
    public function getAttendances() {
        try {
            $attendances = Attendance::select(
                'id',
                'outletId',
                'workerId',
                'attendanceDate',
                'attendanceShift',
                'attendanceIncome',
                'attendanceExpense',
                'attendanceOmset',
                'attendanceCheckIn',
                'attendanceCheckOut',
                'attendanceMessage',
                'attendanceNote',
                )->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['attendances' => $attendances];
                UserServiceProvider::$data['message'] = trans('messages.attendances_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create attendance
     * @return type
     */
    public function createAttendance($request) {
        try {
            $isAttendanceCreated = Attendance::insertGetId([
                'outletId'=>$request->outletId,
                'workerId'=>$request->workerId,
                'attendanceDate'=>$request->attendanceDate,
                'attendanceShift'=>$request->attendanceShift,
                'attendanceIncome'=>$request->attendanceIncome,
                'attendanceExpense'=>$request->attendanceExpense,
                'attendanceOmset'=>$request->attendanceOmset,
                'attendanceCheckIn'=>$request->attendanceCheckIn,
                'attendanceCheckOut'=>$request->attendanceCheckOut,
                'attendanceMessage'=>$request->attendanceMessage,
                'attendanceNote'=>$request->attendanceNote,
            ]);
            if($isAttendanceCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.attendance_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update attendance
     * @return type
     */
    public function updateAttendance($request){
        try{
            $isAttendanceUpdated = Attendance::where('id',$request->attendanceId)->update([
                'outletId'=>$request->outletId,
                'workerId'=>$request->workerId,
                'attendanceDate'=>$request->attendanceDate,
                'attendanceShift'=>$request->attendanceShift,
                'attendanceIncome'=>$request->attendanceIncome,
                'attendanceExpense'=>$request->attendanceExpense,
                'attendanceOmset'=>$request->attendanceOmset,
                'attendanceCheckIn'=>$request->attendanceCheckIn,
                'attendanceCheckOut'=>$request->attendanceCheckOut,
                'attendanceMessage'=>$request->attendanceMessage,
                'attendanceNote'=>$request->attendanceNote,
            ]);
            if($isAttendanceUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.attendance_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete attendance
     * @return type
     */
    public function deleteAttendance($request){
        try {
            $isAttendanceUpdated = Attendance::where('id',$request->attendanceId)->delete();
            if($isAttendanceUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.attendance_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
