<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use App\Models\DataPemeriksaan;
use App\Http\Controllers\Controller;
use App\Models\DataDiri;
use App\Models\DataGejala;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(User $allUser, DataPenyakit $dataPenyakit, DataPemeriksaan $dataPemeriksaan){
        $user = Auth::user();
        $data = [
            'title' => 'Dashboard Admin',
            'name' => $user->name,
            'role' => $user->role,
            'allUser' => $allUser::all()->count(),
            'dataPenyakit' => $dataPenyakit::all()->count(),
            'dataPemeriksaan' => $dataPemeriksaan::all()->count(),
        ];
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
    public function showDiagnose(DataPenyakit $dataPenyakit,DataGejala $dataGejala){
        $user = Auth::user();
        $data = [
            'title' => 'Manajemen Penyakit',
            'name' => $user->name,
            'role' => $user->role,
            'dataGejala' => $dataGejala::all(),
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()==false) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect()->back()->with('success','Tambah data pengguna berhasil');
        }
        elseif ($validator->fails()==true) {
            return redirect()->back()->with('error','Tambah data pengguna gagal. ')->withErrors($validator, 'input');
        }
    }
    public function storeGejala(Request $request){
         $request->validate([
                'gejala' => ['required', 'string', 'max:255'],
            ]);
        
        DataGejala::create([
            'gejala' => strtolower($request['gejala']),
        ]);

        return redirect()->back()->with('success','Tambah data gejala berhasil');;
    }
    public function storePenyakit(Request $request){
        $validator = Validator::make($request->all(), [
            'namaPenyakit' => ['required', 'string', 'max:255'],
            'gejala1' => ['required', 'max:255'],
            'gejala2' => ['required', 'max:255'],
            'gejala3' => ['required', 'max:255'],
            'gejala4' => ['required', 'max:255'],
            'saranDokter' => ['required'],
        ]);
        $gejala1 = implode(', ', array_values($request['gejala1']));
        $gejala2 = implode(', ', array_values($request['gejala2']));
        $gejala3 = implode(', ', array_values($request['gejala3']));
        $gejala4 = implode(', ', array_values($request['gejala4']));

        if ($validator->fails()==false) {
            DataPenyakit::create([
                'nama_penyakit' => $request['namaPenyakit'],
                'gejala1' => strtolower($gejala1),
                'gejala2' => strtolower($gejala2),
                'gejala3' => strtolower($gejala3),
                'gejala4' => strtolower($gejala4),
                'saran_dokter' => $request['saranDokter'],
            ]);            
            return redirect()->back()->with('success','Tambah data penyakit berhasil');
        }
        elseif ($validator->fails()==true) {
            return redirect()->back()->with('error','Tambah data penyakit gagal. ')->withErrors($validator, 'input');
        }
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
            'gejala1' => strtolower($request['gejala1']),
            'gejala2' => strtolower($request['gejala2']),
            'gejala3' => strtolower($request['gejala3']),
            'gejala4' => strtolower($request['gejala4']),
            'saran_dokter' => $request->saranDokter,
        ]);

        return redirect('admin/data-penyakit')->with('success','Update data penyakit berhasil');;
    }
    public function updateDataPengguna(Request $request, User $user){
        $id = $request->id;
        $getUser = $user->firstWhere('id',$id);
        $update = $getUser->update([
            'role' => $request->role
        ]);

        return redirect('admin/data-pengguna')->with('success','Update data pengguna berhasil');;
    }

    public function destroyDataPengguna(User $user, $id){
        $getUser = $user->firstWhere('id',$id);
        $delete = $getUser->delete();
        return redirect('admin/data-pengguna')->with('success','Hapus data pengguna berhasil');;
    }
    public function destroyPenyakit(DataPenyakit $dataPenyakit, $id){
        $getdataPenyakit = $dataPenyakit->firstWhere('id',$id);
        $delete = $getdataPenyakit->delete();
        return redirect('admin/data-penyakit')->with('success','Hapus data penyakit berhasil');;
    }
}
