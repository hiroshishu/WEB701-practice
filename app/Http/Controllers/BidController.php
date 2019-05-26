<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Bid;
use App\Events\NewBid;
use Carbon\Carbon;

class BidController extends Controller
{
    public function makeBid(Request $request, Item $item){
        if(!$item->isEnded()){
            Bid::create([
                'user_id' => $request->user_id ,
                'item_id' => $item->id,
                'amount'  => $request->amount 
            ]);
            $currentBid = $item->currentBid();
            event(new NewBid($item->id, $currentBid->amount, Carbon::now()->timestamp, $currentBid->user->name));
        }
    }
}
