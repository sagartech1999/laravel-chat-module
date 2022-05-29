<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MesssageController extends Controller
{
    public function index(){
        return view('message');
    }

    public function pusherAuth(Request $request){
        header('', true, 403);
        echo "Forbidden";
        return;

        Log::info('auth page');
        dump($request->channel_name);
        dump($request->socket_id);
    }
}
