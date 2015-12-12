<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\Revision;

class RevisionController extends BaseApiController
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
            'rev_id' => 'required',
            'rev_motor' => 'required',
            'rev_tubo' => 'required',
            'rev_bujias' => 'required',
            'rev_bobinas' => 'required',
            'rev_radidador' => 'required',
            'rev_mangeras' => 'required',
            'rev_filtros' => 'required',
            'rev_check' => 'required'
        ]);

        if ($validator->fails()) {
            return self::parseToJson(["message" => "missing params"]);
        }
        Revision::insert([$request->all()]);
        return self::parseToJson(["message" => "success"]);        
    }

    public function getAllRevisions()
    {
        $revisions = Revision::all();
        return self::parseToJson(["message" => "success", "revisions" => $revisions]);
    }

    public function getRevisionByClientCode($code)
    {
        $revision = Revision::where('cli_cod', '=', $code)->first();
        return self::parseToJson(["message" => "success", "revision" => $revision]);
    }

   


}