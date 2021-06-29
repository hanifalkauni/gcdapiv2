<?php

namespace App\Providers;

use App\Models\Worker;

class WorkerServiceProvider extends BaseServiceProvider
{
    public function __construct()
    {
    }

    /**
     * worker list
     * @return type
     */
    public function getWorkers() {
        try {
            $workers = Worker::select('id','workerIdentity','workerName','workerEmail','workerPhone','workerIdPosition','workerDateEntry')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['workers' => $workers];
                UserServiceProvider::$data['message'] = trans('messages.workers_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * create worker
     * @return type
     */
    public function createWorker($request) {
        try {
            $isWorkerCreated = Worker::insertGetId([
                'workerIdentity'=>$request->workerIdentity,
                'workerName'=>$request->workerName,
                'workerEmail'=>$request->workerEmail,
                'workerPhone'=>$request->workerPhone,
                'workerIdPosition'=>$request->workerIdPosition,
                'workerDateEntry'=>$request->workerDateEntry
            ]);
            if($isWorkerCreated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.worker_created');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


      /**
     * update worker
     * @return type
     */
    public function updateWorker($request){
        try{
            $isWorkerUpdated = Worker::where('id',$request->workerId)->update([
                'workerIdentity'=>$request->workerIdentity,
                'workerName'=>$request->workerName,
                'workerEmail'=>$request->workerEmail,
                'workerPhone'=>$request->workerPhone,
                'workerIdPosition'=>$request->workerIdPosition,
                'workerDateEntry'=>$request->workerDateEntry
            ]);
            if($isWorkerUpdated){
                UserServiceProvider::$date['status'] = 1;
                UserServiceProvider::$date['message'] = trans('messages.worker_updated');
            }
        } catch (\Exception $e){
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * delete worker
     * @return type
     */
    public function deleteWorker($request){
        try {
            $isWorkerUpdated = Worker::where('id',$request->workerId)->delete();
            if($isWorkerUpdated){
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['message'] = trans('messages.worker_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }
}
