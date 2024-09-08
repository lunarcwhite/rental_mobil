<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Mobil::paginate(15);
        } catch (\Throwable $th) {
            return view('errors.500');
        }
            $data['mobils'] = $query;
        return view('LandingPage.index')->with($data);
    }

    public function show($id)
    {
        try {
            $query = Mobil::where('id', $id)->first();
        } catch (\Throwable $th) {
            return view('errors.500');
        }
            $data['mobil'] = $query;
        return view('LandingPage.show')->with($data);
    }
}
