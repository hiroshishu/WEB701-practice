<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Catagory-Item: one-many
    public function items(){
        return $this->hasMany(Item::Class);
    }
}
