<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataDiri;
use App\Models\DataPemeriksaan;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = [
            'title' => 'Dashboard User',
            'name' => $user->name,
            'role' => $user->role,
        ];
        return view('user.index', compact('data'));
    }
    public function showProfile(DataDiri $dataDiri){
        $user = Auth::user();
        $data = [
            'title' => 'Data Diri',
            'user_id' => $user->id,
            'role' => $user->role,
            'name' => $user->name,
            'email' => $user->email,
            'tempat_lahir' => 'tempat_lahir',
            'tanggal_lahir' => 'tanggal_lahir',
            'gender' => 'gender',
            'alamat' => 'alamat',
            'dataDiri' => $dataDiri::all(),
        ];

        return view('user.data-diri', compact('data'));
    }
    public function showHealthCheck(DataPenyakit $dataPenyakit){
        $user = Auth::user();
        $data = [
            'title' => 'Pemeriksaan Kesehatan',
            'name' => $user->name,
            'role' => $user->role,
            'dataPenyakit' => $dataPenyakit::all()
        ];
        return view('user.pemeriksaan-kesehatan', compact('data'));
    }
    public function showHistory(DataPemeriksaan $dataPemeriksaan){
        $user = Auth::user();
        $data = [
            'title' => 'Data Pemeriksaan',
            'name' => $user->name,
            'role' => $user->role,
            'dataPemeriksaan' => $dataPemeriksaan::all(),
        ];

        return view('user.data-pemeriksaan', compact('data'));
    }
}
