<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listEvent(){

        $events=Event::get();
        return response()->json([
            'status'=>true,
            'message' => 'Events fetched successfully',
            'data' => $events
        ], 200);
    }
}
