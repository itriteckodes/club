<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\CardOne;
use App\Models\CardTwo;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request){
        $card1 = CardOne::all();
        $card2 = CardTwo::all();
        $response = new Api();
        $response->add('cardOneData', $card1);
        $response->add('cardTwoData', $card2);
        return $response->json();
    }
}
