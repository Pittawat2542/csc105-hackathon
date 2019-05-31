<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getGeo(Request $request) {
        Session::put('userLat', $request->latitude);
        Session::put('userLng', $request->longitude);
        return "updated location". Session::pull('userLat').','.Session::pull('userLng');
    }
}
