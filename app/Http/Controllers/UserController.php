<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\GenerateRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Providers\UserServiceProvider;

class UserController extends BaseApiController
{
    public $userServiceProvider;
    public function __construct()
    {
        $this->userServiceProvider = new UserServiceProvider();
    }

    public function create(RegisterUserRequest $request) {
        $result = $this->userServiceProvider->registerUser($request);
        return $this->returnResponse($result);
    }

    public function login(LoginUserRequest $request) {
        $result = $this->userServiceProvider->login($request);
        return $this->returnResponse($result);
    }

    public function get() {
        $result = $this->userServiceProvider->getUsers();
        return $this->returnResponse($result);
    }

    public function getOne(UserRequest $request) {
        $result = $this->userServiceProvider->getUser($request);
        return $this->returnResponse($result);
    }

    public function generateToken(GenerateRequest $request) {
        $result = $this->userServiceProvider->generateToken($request);
        return $this->returnResponse($result);
    }
}