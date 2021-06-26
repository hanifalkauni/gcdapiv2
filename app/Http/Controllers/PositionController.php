<?php

namespace App\Http\Controllers;

use App\Http\Requests\Position\DeletePositionRequest;
use App\Http\Requests\Position\UpdatePositionRequest;
use App\Http\Requests\Position\CreatePositionRequest;
use App\Providers\PositionServiceProvider;

class PositionController extends BaseApiController
{
    public $positionServiceProvider;
    public function __construct()
    {
        $this->positionServiceProvider = new PositionServiceProvider();
    }

    public function get() {
        $result = $this->positionServiceProvider->getPositions();
        return $this->returnResponse($result);
    }

    public function create(CreatePositionRequest $request){
        $result = $this->positionServiceProvider->createPosition($request);
        return $this->returnResponse($result);
    }

    public function update(UpdatePositionRequest $request){
        $result = $this->positionServiceProvider->updatePosition($request);
        return $this->returnResponse($result);
    }

    public function delete(DeletePositionRequest $request){
        $result = $this->positionServiceProvider->deletePosition($request);
        return $this->returnResponse($result);
    }
}
