<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Item-Category: many-one
    public function category(){
        return $this->belongsTo(Category::Class);
    }

    //Item-User: many-one
    public function user(){
        return $this->belongsTo(User::Class);
    }

    //Item-Bid: one-many
    public function bids(){
        return $this->hasMany(Bid::Class);
    }

    /**
     * The highest bid by bid amount.
     * @return Bid
     */
    public function currentBid()
    {
        return $this->bids()->orderBy('amount', 'desc')->first() ;
    }

    /**
     * The user name of the user who placed the highest bid.
     * @return string
     */
    public function highBidder()
    {
        return $this->currentBid()->user->name ?? 'No High Bidder';
    }

    /**
     * Has this item's listing ended meaning is it now later than the item's end time.
     * @return bool
     */
    public function isEnded(){
        return ($this->end_time < Carbon::now());
    }
}
