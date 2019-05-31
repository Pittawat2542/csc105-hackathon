<?php

namespace App\Http\Controllers;

use App\Raport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('user-dashboard', ['raports'=>Raport::where('user_id', '=', Auth::user()->id)->get()]);
    }

    public function getGeo(Request $request) {
        Session::put('userLat', $request->latitude);
        Session::put('userLng', $request->longitude);
        return "updated location". Session::get('userLat').','.Session::get('userLng');
    }
}
