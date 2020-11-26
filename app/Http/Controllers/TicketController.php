<?php

namespace App\Http\Controllers;

use App\PlaceModel;
use App\TicketModel;
use Illuminate\Http\Request;
use voku\helper\ASCII;
use function GuzzleHttp\Promise\all;

class TicketController extends Controller
{
  public function ShowPlace(Request $request) : object{//Показывает все места в зале для их разметки
      $model = new PlaceModel();
      $modelticket = new TicketModel();
      $ticket = $modelticket->checkthebilet($request);
      $place = $model->ShowPlaceSit($request);
      $places= array();
      foreach($place as $item){
          $places[$item->row][] = [
              'place_id' =>$item->place_id,
              'spot' => $item->spot,
              'zal_id' => $item->zal_id
          ];
      }
      return response()->json(['occupied' => $ticket , 'place' =>$places]);

  }
  public function buyTicket (Request $request) :object{ //Купить билет

    $ticketinfo  = $request->all();
    $mika= explode('&' , $ticketinfo['place'] );
    foreach ($mika as $ticket) {
        $huika = explode('=' , $ticket);
        $model = new TicketModel();
        $model->zal_id = $ticketinfo['hall'];
        $model->seance_id = $ticketinfo['seance'];
        $model->place_id = $huika[1];
        $model->film_id = $ticketinfo['Film'];
        $model->status_place = '1';
        $model->cost = $ticketinfo['cost'];
        $model->save();
    }
      return response()->json(['success' => 'true']);
  }
}
