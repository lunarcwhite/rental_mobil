<?php

namespace App\Http\Controllers\AdminRental;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;

class KelolaMobilController extends Controller
{
    public function index()
    {
        $data['mobils'] = Mobil::all();
        return view('AdminRental.kelolaMobil.index')->with($data);
    }
}
