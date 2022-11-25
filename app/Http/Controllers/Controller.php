<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function isSuccess($url){
        return redirect($url)->with('success','Data berhasil disimpan');
    }
    protected static function isError($message){
        return redirect()->back()->with('error', $message);
    }

    protected static function isDelete(){
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }

}
