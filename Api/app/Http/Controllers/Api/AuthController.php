<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends BaseApiController
{

    public function __construct(){
        //
    }

    /**
    * Response Methods
    */

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return self::parseToJson(["message" => "missing password or code"]);
        }

        $user = User::where('codusu', '=', $request["code"])->first();
        if (is_null($user)) {
            return self::parseToJson(["message" => "bad code"]);
        }

        if ($user->pass == $request['password']) {
            return self::parseToJson(["message" => "success"]);
        }else{
            return self::parseToJson(["message" => "bad password"]);
        }
    }

   


}