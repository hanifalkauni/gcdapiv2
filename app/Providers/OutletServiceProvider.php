<?php

namespace App\Providers;

use App\Models\Outlet;


class OutletServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
    }

    /**
     * outlet list
     * @return type
     */
    public function getOutlets() {
        try {
            $outlets = Outlet::select('id','outletName','outletLocation','outletDateOperation')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['outlets' => $outlets];
                UserServiceProvider::$data['message'] = trans('messages.outlets_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * create outlet
     * @return type
     */
    public function createOutlet($request) {
        try {
            $isOutletCreated = Outlet::insertGetId([
                'outletName'=>$request->outletName,
                'outletLocation'=>$request->outletLocation,
                'outletDateOperation'=>$request->outletDateOperation
            ]);
            if($isOutletCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.outlet_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * update outlet
     * @return type
     */
    public function updateOutlet($request) {
        try {
            $isOutletUpdated = Outlet::where('id',$request->outletId)->update([
                'outletName'=>$request->outletName,
                'outletLocation'=>$request->outletLocation,
                'outletDateOperation'=>$request->outletDateOperation
            ]);
            if($isOutletUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.outlet_updated');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete outlet
     * @return type
     */
    public function deleteOutlet($request){
        try {
            $isOutletUpdated = Outlet::where('id',$request->outletId)->delete();
            if($isOutletUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.outlet_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


}