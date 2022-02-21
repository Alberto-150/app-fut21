<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\player;

class PlayersController extends Controller
{
    public function playersForTeam(Request $request)
    {
        $players = player::where("team", 'like', "%{$request->name}%")->paginate(20);

        return response()->json([
            "Page" => $players->currentPage(),
            "totalPages" => $players->lastPage(),
            "Items" => $players->count(),
            "totalItems" => $players->total(),
            "Players" => $players->items(),
        ], 200);
    }
    
    public function playersForName(Request $request)
    {
        $order = (isset($request->order)) ? $request->order : "asc";

        $players = player::where("name", 'like', "%{$request->search}%")->orderBy('name', $order)->paginate(20);

        return response()->json([
            "Page" => $players->currentPage(),
            "totalPages" => $players->lastPage(),
            "Items" => $players->count(),
            "totalItems" => $players->total(),
            "Players" => $players->items(),
        ], 200);
    }
}
