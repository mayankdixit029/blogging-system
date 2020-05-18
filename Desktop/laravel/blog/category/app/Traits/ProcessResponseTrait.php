<?php 
namespace App\Traits;

trait ProcessResponseTrait
{
    public function processResponse($data,$status,$message=null)
    {
        if($status=='success')
    {
        return response()->json([
            'status'=>'success',
            'blogs'=>$data,
            'code'=>200,
            'message'=>$message
]);
    }
    else{
        return response()->json([
            'status'=>'error',
            'code'=>404,
            'message'=>$message
        ]);
    }
        

    }
}