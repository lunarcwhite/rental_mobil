<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PersetujuanAkun;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->roleId == 1){
            return view('superAdmin.dashboard.index');
        }elseif ($user->roleId == 2) {
            $data['penolakans'] = PersetujuanAkun::where('userId', $user->id)->get();
            return view('adminRental.dashboard.index')->with($data);
        }elseif ($user->roleId == 3){
            return view('adminRental.dashboard.index');
        }
    }
}
