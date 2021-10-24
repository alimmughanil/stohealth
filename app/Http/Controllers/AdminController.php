<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPemeriksaan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $data = $this->postData('Dashboard Admin');
        return view('admin.index', compact('data'));
    }
    public function showUser(User $dataUser){
        $user = Auth::user();
        $data = [
            'title' => 'Manajemen Pengguna',
            'name' => $user->name,
            'role' => $user->role,
            'dataUser' => $dataUser::all(),
        ];
        return view('admin.data-pengguna', compact('data'));
    }
    public function showDiagnose(DataPenyakit $dataPenyakit){
        $user = Auth::user();
        $data = [
            'title' => 'Manajemen Penyakit',
            'name' => $user->name,
            'role' => $user->role,
            'dataPenyakit' => $dataPenyakit::all(),
        ];
        return view('admin.data-penyakit', compact('data'));
    }
    public function showHistory(DataPemeriksaan $dataPemeriksaan){
        $user = Auth::user();
        $data = [
            'title' => 'Data Pemeriksaan',
            'name' => $user->name,
            'role' => $user->role,
            'dataPemeriksaan' => $dataPemeriksaan::all(),
        ];
        return view('admin.data-pemeriksaan', compact('data'));
    }
}
