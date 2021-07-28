<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardOne;
use App\Models\CardTwo;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request){
        $card1 = CardOne::all();
        $card2 = CardTwo::all();
        $data = $card1->merge($card2);
        return response()->json($data);
    }
}
