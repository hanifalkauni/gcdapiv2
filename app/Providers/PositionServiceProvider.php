<?php

namespace App\Providers;

use App\Models\Position;

class PositionServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

     /**
     * position list
     * @return type
     */
    public function getPositions() {
        try {
            $positions = Position::select('id','positionName','salary')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['positions' => $positions];
                UserServiceProvider::$data['message'] = trans('messages.positions_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * create position
     * @return type
     */
    public function createPosition($request) {
        try {
            $isPositionCreated = Position::insertGetId([
                'positionName'=>$request->positionName,
                'salary'=>$request->salary,
            ]);
            if($isPositionCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.position_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * update position
     * @return type
     */
    public function updatePosition($request) {
        try {
            $isPositionUpdated = Position::where('id',$request->positionId)->update(['positionName'=>$request->positionName, 'salary'=>$request->salary]);
            if($isPositionUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.position_updated');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * delete product
     * @return type
     */
    public function deletePosition($request){
        try {
            $isPositionUpdated = Position::where('id',$request->positionId)->delete();
            if($isPositionUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.position_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

}
