<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getGeo(Request $request) {
        $data['lat'] = $request->lat;
        $data['lng'] = $request->lng;
        if(Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            $user->update($data);
        }

        Session::put('userLat', $request->lat);
        Session::put('userLng', $request->lat);
        dd(session()->all());
        return "updated location". session()->get('userLat');
    }
}
