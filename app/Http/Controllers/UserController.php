<?php

namespace App\Http\Controllers;

use App\Category;
use App\Raport;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $circle_radius = 3959;
        $max_distance = 20;
        if((Session::get('userLat')!=null) | (Session::get('userLng')!=null)) {
            $lat = str_replace(',', '.', Session::get('userLat'));
            $lng = str_replace(',', '.', Session::get('userLng'));
            $raportsAround = DB::raw('SELECT * FROM
                            (SELECT id, photo_id, title, body, lat, lng, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(lat)) *
                            cos(radians(lng) - radians(' . $lng . ')) +
                            sin(radians(' . $lat . ')) * sin(radians(lat))))
                            AS distance
                            FROM `raports`) AS distances
                        WHERE distance < ' . $max_distance . '
                        ORDER BY distance
                        OFFSET 0
                        LIMIT 20;
                    ');
        } else {
            $raportsAround = Raport::all();
        }
        return view('user-dashboard', ['raports'=>$raportsAround, 'categories'=>Category::all()]);
    }

    public function getGeo(Request $request) {
        Session::put('userLat', $request->latitude);
        Session::put('userLng', $request->longitude);
        return "updated location". Session::get('userLat').','.Session::get('userLng');
    }
}
