<?php

namespace App\Http\Controllers;

use App\PlaceModel;
use App\TicketModel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
  public function cheackplace(Request $request) : object { //Подключить для валидации на стороне клиента для диапозона билетов
      $model = new PlaceModel();
      $check= $model->CheckPlace($request);
//      if (!$check->isEmpty()){
//      return response()->json(['success' => 'true']);}
//      else {return response()->json(['error']);}
      return !$check->isEmpty() ? response()->json(['success' => 'true']) :  response()->json(['error']);
  }
  public function buyTicket(Request $request){
  }

}
