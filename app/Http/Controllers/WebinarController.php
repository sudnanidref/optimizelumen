<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Ticket;

class WebinarController extends Controller
{
    public function index()
    {
        return response()->json([
            'webinar_name' => 'webinar abc',
            'video_embed' => 'https://xyz.com'
        ], 200);
    }
}