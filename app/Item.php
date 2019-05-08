<?php

namespace App;

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
}
