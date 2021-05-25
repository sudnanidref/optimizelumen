<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Ticket;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

// use Tymon\JWTAuth\Facades\JWTAuth;
// use Tymon\JWTAuth\Facades\JWTFactory;

// use Illuminate\Support\Facades\Cookie;

use DB;

class AuthController extends Controller
{
    public function index()
    {
        $ticket = DB::select("SELECT ticket_code FROM ticket LIMIT 10");
        dd($ticket);
    }

    public function checkTicket(Request $request)
    {
        $ticket = DB::SELECT("SELECT ticket_code FROM ticket WHERE ticket_code = '{$request->ticket_code}'");

        if ($ticket) {
            return response()->json([
                'message' => 'success !'
            ], 200);
        }
    }
}
