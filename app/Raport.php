<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $fillable = ['user_id', 'user_id_report', 'photo_id', 'title', 'body', 'lat', 'lng', 'category_id'];

    public function isFixed() {
        if(!empty($this->user_id)) {
            return true;
        } else {
            return false;
        }
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function userReport() {
        return $this->belongsTo('App\User', 'user_id_raport');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

}
