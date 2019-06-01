<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlists";

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function raport(){
        return $this->belongsTo('App\Raport');
    }
}
