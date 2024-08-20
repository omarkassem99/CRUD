<?php
namespace App\Http\Controllers\API;

trait ApiResponseTrait
{
    public function apiResponse($data,$msg,$status)
    {
        $response = [
            'data'=> $data,
            'message'=>$msg,
            'status'=> $status
        ];
        return response($response,$status);
    }
}