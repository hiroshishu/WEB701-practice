<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{

    protected $fillable = [
        'user_id',
        'item_id',
        'amount'
    ];
    
    //Bid-User: many-one
    public function user(){
        return $this->belongsTo(User::Class);
    }

    //Bid-Item: many-one
    public function item(){
        return $this->belongsTo(Item::Class);
    }

}
