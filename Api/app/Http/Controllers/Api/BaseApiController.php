<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{

    public function __construct(){
        //
    }

    /**
    * Response Methods
    */

    public function parseToJson($response){
        return response()->json($response);
    }


}