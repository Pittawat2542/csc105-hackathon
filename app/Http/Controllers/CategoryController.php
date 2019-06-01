<?php

namespace App\Http\Controllers;

use App\Category;
use App\Raport;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if((Session::get('userLat')!=null) | (Session::get('userLng')!=null)) {
            $lat = str_replace(',', '.', Session::get('userLat'));
            $lng = str_replace(',', '.', Session::get('userLng'));
            $query = Raport::distance($lat, $lng)->where('category_id', '=', $id);
            $raportsAround  = $query->orderBy('distance', 'ASC')->get();
        } else {
            $raportsAround = Raport::where('category_id', '=', $id)->get();
        }
        return view('index', ['raports'=>$raportsAround, 'categories'=>Category::all()]);
    }

}
