<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\Client;

class ClienteController extends BaseApiController
{

    public function __construct(){
        //
    }

    /**
    * Response Methods
    */

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'cli_cod' => 'required',
            'cli_dni' => 'required',
            'cli_nombre' => 'required',
            'cli_pater' => 'required',
            'cli_mater' => 'required',
            'cli_telf' => 'required',
            'cli_email' => 'required',
            'cli_direccion' => 'required',
            'cli_tipvehiculo' => 'required',
            'cli_marca' => 'required',
            'cli_model' => 'required',
            'cli_placa' => 'required'
        ]);

        if ($validator->fails()) {
            return self::parseToJson(["message" => "missing params"]);
        }
        Client::insert([$request->all()]);
        return self::parseToJson(["message" => "success"]);        
    }

    public function getAllClients()
    {
        $clients = Client::all();
        return self::parseToJson(["message" => "success", "clients" => $clients]);
    }

   


}