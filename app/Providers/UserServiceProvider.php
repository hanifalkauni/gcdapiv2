<?php

namespace App\Providers;

use App\Helpers\AppUtility;
use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * UserServiceProvider class contains methods for user management
 */
class UserServiceProvider extends BaseServiceProvider {

    protected $userModelObj;
    protected $accessTokenObj;
    public function __construct()
    {
        $this->userModelObj = new User();
        $this->accessTokenObj = new AccessToken();
    }

    /**
     * Register a user
     * @param type $request
     * @return type
     */
    public function registerUser($request) {
        try {
            $utilObj = new AppUtility();
            $password = $utilObj->generatePassword($request['password']);
                $userId = $this->userModelObj->create($request,$password);
                $accessToken = md5(uniqid(mt_rand(), true));
                $isAccessTokenCreated = $this->accessTokenObj->create($request, $accessToken, $userId);
                if ($userId && $isAccessTokenCreated) {
                    UserServiceProvider::$data['status'] = 1;
                    UserServiceProvider::$data['data'] = array_merge($request->all(), ['accessToken' => $accessToken]);
                    UserServiceProvider::$data['message'] = trans('messages.user_registered');
                    }
        } catch (\Exception $e) {
                $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


    /**
     * Login User
     *
     * @param type $data
     * @return type
     */
    public function login($data) {
        try {
            UserServiceProvider::$data['message'] = trans('auth.failed');
            $user = User::where('email', $data['email'])->first();
            if(!empty($user)) {
                $utilObj = new AppUtility();
                $isPasswordMatched = $utilObj->matchPassword($data['password'], $user->password);
                if ($isPasswordMatched) {
                    $accessToken = md5(uniqid(mt_rand(), true));
                   $accessTokenData =  AccessToken::select('accessToken')->where('userId',$user->id)->where('deviceId',$data->deviceId)->where('deviceType',$data->deviceType)->first();
                    if(empty($accessTokenData)) {
                        $isAccessTokenCreated = $this->accessTokenObj->create($data, $accessToken, $user->id);
                        if ($user->id && $isAccessTokenCreated) {
                            UserServiceProvider::$data['status'] = 1;
                            UserServiceProvider::$data['data'] = ['accessToken' => $accessToken];
                            UserServiceProvider::$data['message'] = trans('messages.login_success');
                        }
                    }else {
                        UserServiceProvider::$data['status'] = 1;
                        UserServiceProvider::$data['data'] = ['accessToken' => $accessTokenData->accessToken];
                        UserServiceProvider::$data['message'] = trans('messages.already_login');
                    }
                }
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    /**
     * users list
     * @return type
     */
    public function getUsers() {
        try {
            $users = DB::table('users')->join('access_tokens','users.id','userId')
                        ->select('userId','name','email','role','status','accessToken')->get();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['users' => $users];
                UserServiceProvider::$data['message'] = trans('messages.users_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    public function getUser($request) {
        try {
            $users = DB::table('users')->join('access_tokens','users.id','userId')
                        ->select('userId','name','email','role','status','accessToken')
                        ->where('userId',$request->userId)->first();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['users' => $users];
                UserServiceProvider::$data['message'] = trans('messages.users_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }

    public function generateToken($request) {
        try {
            $userId=$request->userId;
            $utilObj = new AppUtility();
            $accessToken = md5(uniqid(mt_rand(), true));
            $isAccessTokenCreated = $this->accessTokenObj->create($request, $accessToken, $userId);
            $users = DB::table('users')->join('access_tokens','users.id','userId')
                        ->select('userId','name','email','role','status','accessToken')
                        ->where('userId',$request->userId)->first();
                UserServiceProvider::$data['status'] = 1;
                UserServiceProvider::$data['data'] = ['users' => $users];
                UserServiceProvider::$data['message'] = trans('messages.users_list');

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return UserServiceProvider::$data;
    }


}