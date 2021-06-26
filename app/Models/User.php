<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    const APP_USER = 2;

    public function create($request,$password){
            return User::insertGetId(['name'=>$request->name,'email'=>$request->email,'password'=>$password,'password'=>$password]);
    }
}
