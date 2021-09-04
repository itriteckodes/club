<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $credentials = ApiValidate::register($request, User::class);

        $user = User::latest()->first();
        $code = 1;


        if ($user)
            $code = $user->id + 1;

        $user = User::create([
            'code' => 'TWB' . $code
        ] + $credentials);



        $user = User::find($user->id);
        return Api::setResponse('user', $user->withToken());
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return Api::setResponse('user', $user->withToken());
    }
    public function update(Request $request)
    {
        if ($request->has('id')) {
            $user = User::find($request->id);
            if ($user != null) {
                $user->update($request->all());
                return Api::setResponse('user', $user->withToken());
            } else {
                return Api::setError('Sorry no user found');
            }
        } else {
            return Api::setError('id is required');
        }
    }

    public function login(Request $request)
    {
        $credentials = ApiValidate::login($request, User::class);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return Api::setResponse('user', $user->withToken());
        } else
            return Api::setError('Invalid credentials');
    }
}
