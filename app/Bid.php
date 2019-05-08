<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //Bid-User: many-one
    public function user(){
        return $this->belongsTo(User::Class);
    }

    //Bid-Item: many-one
    public function item(){
        return $this->belongsTo(Item::Class);
    }

}
