<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\DeleteWorkerRequest;
use App\Http\Requests\Worker\UpdateWorkerRequest;
use App\Http\Requests\Worker\CreateWorkerRequest;
use App\Providers\WorkerServiceProvider;

class WorkerController extends BaseApiController
{
    public $workerServiceProvider;
    public function __construct()
    {
        $this->workerServiceProvider = new WorkerServiceProvider();
    }

    public function get() {
        $result = $this->workerServiceProvider->getWorkers();
        return $this->returnResponse($result);
    }

    public function create(CreateWorkerRequest $request){
        $result = $this->workerServiceProvider->createWorker($request);
        return $this->returnResponse($result);
    }

    public function update(UpdateWorkerRequest $request){
        $result = $this->workerServiceProvider->updateWorker($request);
        return $this->returnResponse($result);
    }


    public function delete(DeleteWorkerRequest $request){
        $result = $this->workerServiceProvider->deleteWorker($request);
        return $this->returnResponse($result);
    }
}
