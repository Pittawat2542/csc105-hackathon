<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRaport;
use App\Raport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circle_radius = 3959;
        $max_distance = 20;
        $lat = Session::pull('userLat');
        $lng = Session::pull('userLng');

         $raportsAround = DB::select(
             'SELECT * FROM
                            (SELECT id, photo_id, title, body, lat, lng, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(lat)) *
                            cos(radians(lng) - radians(' . $lng . ')) +
                            sin(radians(' . $lat . ')) * sin(radians(lat))))
                            AS distance
                            FROM raports) AS distances
                        WHERE distance < ' . $max_distance . '
                        ORDER BY distance
                        OFFSET 0
                        LIMIT 20;
                    ');
         return view('home', ['raports'=>$raportsAround]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('raport.create', ['categories'=>Categories::pluck('id', 'name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save picture and get id of it;
        $data = $request;
        $data['user_id'] = Auth::user()->id;
        Raport::create($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('raport.show', ['raport'=>Raport::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function edit(Raport $raport)
    {
        //
    }


    /**
     * This is controller for fixed page where user can approve the fixed problem
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fixed($id) {
        $raport = Raport::findOrFail($id);
        $raport['user_id'] = Auth::user()->id;
        $raport->save();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raport $raport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raport $raport)
    {
        //
    }
}
