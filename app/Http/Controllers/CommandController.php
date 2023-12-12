<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Response;

class CommandController extends Controller
{
    public function clearCache(){
            Artisan::call('cache:clear');
            return Response::json('Cash Cleared');
    }
    public function clearConfig(){
        Artisan::call('config:clear');
        return Response::json('Cash Cleared');
    }

    public function jwtSecret(){
       $data =  Artisan::call('jwt:secret');
        return Response::json('okey');
    }
}
