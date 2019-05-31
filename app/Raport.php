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

    public function distance() {
            $lng1 = Session::get('userLng');
            $lon1 = Session::get('userLon');
            $lng2 = $this->lat;
            $lon2 = $this->lng;
            $R = 6371; // Radius of the earth in km
            $dLat = ($lat2-$lat1)* (Math.PI/180);  // deg2rad below
            $dLon = ($lon2-$lon1)* (Math.PI/180);
            $a =
                Math.sin($dLat/2) * Math.sin($dLat/2) +
                Math.cos(($lat1)* (Math.PI/180)) * Math.cos(($lat2)* (Math.PI/180)) *
                Math.sin($dLon/2) * Math.sin($dLon/2)
            ;
            $c = 2 * Math.atan2(Math.sqrt($a), Math.sqrt(1-$a));
            $d = $R * $c; // Distance in km
            return $d;
        }

}
