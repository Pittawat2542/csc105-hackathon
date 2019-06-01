<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Malhal\Geographical\Geographical;

class Raport extends Model
{
    protected $fillable = ['user_id', 'user_id_report', 'photo_id', 'title', 'body', 'lat', 'lng', 'category_id'];
    use Geographical;
    protected static $kilometers = true;
    const LATITUDE  = 'lat';
    const LONGITUDE = 'lng';

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
        return $this->belongsTo('App\User', 'id', 'user_id_raport');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function wishlist(){
        return $this->hasOne(Wishlist::class);
    }

    public function calculateDistance() {
        $lat1 = $this->lat;
        $lat2 = Session::get('userLat');
        $lon1 = $this->lng;
        $lon2 = Session::get('userLng');
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $result = $miles * 1.609344;
            if($result<1) {
                    $resRound = round($result, 3)*1000;
                    return $resRound + " meters";
                } else {
                    $resRound = round($result,1);
                    return $resRound + " km";
                }
            }
        }
    }

}
