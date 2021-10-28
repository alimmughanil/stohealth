<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use App\Models\DataPemeriksaan;
use App\Http\Controllers\Controller;
use App\Models\DataDiri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function storeUser(Request $request){
         $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back();
    }
    public function storePenyakit(Request $request){
         $request->validate([
                'namaPenyakit' => ['required', 'string', 'max:255'],
                'gejala1' => ['required', 'string', 'max:255'],
                'gejala2' => ['required', 'string', 'max:255'],
                'gejala3' => ['required', 'string', 'max:255'],
                'gejala4' => ['required', 'string', 'max:255'],
                'saranDokter' => ['required'],
            ]);
        
        DataPenyakit::create([
            'nama_penyakit' => $request['namaPenyakit'],
            'gejala1' => $request['gejala1'],
            'gejala2' => $request['gejala2'],
            'gejala3' => $request['gejala3'],
            'gejala4' => $request['gejala4'],
            'saran_dokter' => $request['saranDokter'],
        ]);

        return redirect()->back();
    }

    public function getDataPenyakit(DataPenyakit $dataPenyakit){
        $id =  $_GET['id'];
        $getData = $dataPenyakit->firstWhere('id', $id) ;
        echo json_encode($getData);
    }
    public function editDataPenyakit(DataPenyakit $dataPenyakit){
        $id =  $_GET['id'];
        $getData = $dataPenyakit->firstWhere('id', $id) ;
        echo json_encode($getData);
    }
    public function getDataUser(DataDiri $dataDiri){
        $id =  $_GET['id'];
        $getData = $dataDiri->firstWhere('user_id', $id) ;
        echo json_encode($getData);
    }
    public function getRoleUser(User $user){
        $id =  $_GET['id'];
        $getData = $user->firstWhere('id', $id) ;
        echo json_encode($getData);
    }

    public function updatePenyakit(Request $request, DataPenyakit $dataPenyakit){
        $id = $request->id;
        $getDataPenyakit = $dataPenyakit->firstWhere('id',$id);

        $update = $getDataPenyakit
        ->update([
            'nama_penyakit' => $request->namaPenyakit,
            'gejala1' => $request->gejala1,
            'gejala2' => $request->gejala2,
            'gejala3' => $request->gejala3,
            'gejala4' => $request->gejala4,
            'saran_dokter' => $request->saranDokter,
        ]);

        return redirect('admin/data-penyakit');
    }
    public function updateDataPengguna(Request $request, User $user){
        $id = $request->id;
        $getUser = $user->firstWhere('id',$id);
        $update = $getUser->update([
            'role' => $request->role
        ]);

        return redirect('admin/data-pengguna');
    }

    public function destroyDataPengguna(User $user, $id){
        $getUser = $user->firstWhere('id',$id);
        $delete = $getUser->delete();
        return redirect('admin/data-pengguna');
    }
    public function destroyPenyakit(DataPenyakit $dataPenyakit, $id){
        $getdataPenyakit = $dataPenyakit->firstWhere('id',$id);
        $delete = $getdataPenyakit->delete();
        return redirect('admin/data-penyakit');
    }
}
