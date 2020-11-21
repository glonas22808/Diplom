<?php

namespace App\Http\Controllers;

use App\PlaceModel;
use App\TicketModel;
use Illuminate\Http\Request;

class TicketController extends Controller
{


  public function ShowPlace(Request $request) : object{//Показывает все места в зале для их разметки
      $model = new PlaceModel();
      $place = $model->ShowPlaceSit($request);
      return response()->json(['place' => $place]);
  }
  public function buyTicket (Request $request) :object{ //Купить билет
    $model = new TicketModel();
    $ticketinfo  = $request->all();
      $model->zal_id = $ticketinfo['zal_id'];
      $model->seance_id = $ticketinfo['seance_id'];
      $model->place_id =$ticketinfo['place_id'];
      $model->film_id =$ticketinfo['film_id'];
      $model->cost =$ticketinfo['cost'];
      $model->save();
      return response()->json(['success' => 'true']);
  }
  public function boughtTicket(Request $request) : object{ //Для клента вывод уже купленных билетов
      $model = new TicketModel();
      $ticket = $model->checkthebilet($request);
      return response()->json(['occupied' => $ticket]);
  }

}
