<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $credentials = ApiValidate::register($request, User::class);
        $user = User::create([
            'code' => uniqid(60)
        ]+$credentials);
        return Api::setResponse('user', $user->withToken());
    }

    public function edit(Request $request){
        $user = User::find($request->id);
        return Api::setResponse('user',$user->withToken());
    } 
    public function update(Request $request){
        if($request->has('id')){
            $user = User::find($request->id);
            if($user!=null){
                $user->update($request->all());
                return Api::setResponse('user', $user->withToken());
            }else{
                return Api::setError('Sorry no user found');
            }
        }else{
            return Api::setError('id is required');
        }
    }
}
