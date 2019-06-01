<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Raport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }

    public function index() {
        $lat = str_replace(',', '.', Session::get('userLat'));
        $lng = str_replace(',', '.', Session::get('userLng'));
        $query = Raport::distance($lat, $lng);
        $raports  = $query->orderBy('distance', 'ASC')->paginate(25);
        return view('dashboard-admin', ['raports'=>$raports]);
    }

    public function destroy($id) {
        $raport = Raport::findOrFail($id);
        $raport->delete();
        return redirect('/admin');
    }

    public function edit($id) {
        return view('raport-edit', ['raport'=>Raport::findOrFail($id), 'categories'=>Category::all()]);
    }

    public function update(Request $request, $id) {
        $raport = Raport::findOrFail($id);
            $data = $request->except('user_id', 'user_id_report');
            $photo = new Photo();
            if($file = $request->file('photo')){
                $data['photo_id'] = $photo->photoUpload($request->file('photo'), 'raport_', '0', Auth::user()->id);
            }
            $raport->update($data);
            return redirect('/');
    }

}
