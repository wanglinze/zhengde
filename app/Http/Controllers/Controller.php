<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = null){
        $res = ['success' => true];
        if($data !== null){
            $res['data'] = $data;
        }
        return response()->json($res);
    }

    public function error($data, $errorCode = NULL){
        if(is_array($data)){
            $response = [
                'success' => false,
                'errorCode' => 10001,
                'data' => $data
            ];
        }
        if (is_string($data)) {
            $response = [
                'success' => false,
                'errorCode' => 10002,
                'message' => $data
            ];
        }
        if($errorCode){
            $response['errorCode'] = $errorCode;
        }
        return response()->json($response);
    }

    public function dd($data){
        http_response_code(500);
        dd($data);
    }
}
