<?php

namespace App\Http\Controllers;

use App\Raport;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(['admin']);
    }

    public function index() {
        return view('dashboard-admin', ['raports'=>Raport::paginate(25)]);
    }

    public function distroy($id) {

    }
}
