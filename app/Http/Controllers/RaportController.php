<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\RequestRaport;
use App\Photo;
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
        if ((Session::get('userLat') != null) | (Session::get('userLng') != null)) {
            $lat = str_replace(',', '.', Session::get('userLat'));
            $lng = str_replace(',', '.', Session::get('userLng'));
            $query = Raport::distance($lat, $lng);
            $raportsAround = $query->orderBy('distance', 'ASC')->where('user_id', '=', null)->get();

        } else {
            $raportsAround = Raport::where('user_id', '=', null);
        }
        return view('index', ['raports' => $raportsAround, 'categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('user_id');
        $data['user_id_report'] = Auth::user()->id;
        $data['lng'] = Session::get('userLng');
        $data['lat'] = Session::get('userLat');
        $photo = new Photo();
        if ($file = $request->file('photo')) {
            $data['photo_id'] = $photo->photoUpload($request->file('photo'), 'raport_', '0', Auth::user()->id);
        }
        Raport::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Raport $raport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('fixed-report', ['raport' => Raport::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Raport $raport
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
    public function fixed(Request $request)
    {
        $raport = Raport::findOrFail($request->id);
        $requestRaport['user_id'] = Auth::user()->id;
        $raport->update($requestRaport);
        $photo = new Photo();

        if ($file = $request->file('photo')) {
            $data['photo_id'] = $photo->photoUpload($request->file('photo'), 'raport_', $request->id, Auth::user()->id);
        }

        return redirect('/fixed-thank');
    }

    public function thank()
    {
        return view('fixed-report-thank');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Raport $raport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raport $raport)
    {
        //
    }

}
