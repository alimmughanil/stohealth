<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataDiri;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use App\Models\DataPemeriksaan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $getDataDiri = $dataDiri->firstwhere('user_id', $user->id);
        if (empty($getDataDiri)) {            
            $data = [
                'title' => 'Data Diri',
                'user_id' => $user->id,
                'role' => $user->role,
                'name' => $user->name,
                'email' => $user->email,
                'birth_place' => '-',
                'birth_date' => '-',
                'gender' => '-',
                'address' => '-',
            ];
        }
        if (!empty($getDataDiri)) {            
            $data = [
                'title' => 'Data Diri',
                'user_id' => $user->id,
                'role' => $user->role,
                'name' => $user->name,
                'email' => $user->email,
                'birth_place' => $getDataDiri->birth_place,
                'birth_date' => $getDataDiri->birth_date,
                'gender' => $getDataDiri->gender,
                'address' => $getDataDiri->address,
            ];
        }
        return view('user.data-diri', compact('data'));
    }
    public function showHealthCheck(DataPenyakit $dataPenyakit){
        $user = Auth::user();
        $dataDiri = new DataDiri;
        $getDataDiri = $dataDiri->firstWhere('user_id', $user->id);
        $gejala1 = DB::table('data_penyakit')->distinct()->get('gejala1');
        $gejala2 = DB::table('data_penyakit')->distinct()->get('gejala2');
        $gejala3 = DB::table('data_penyakit')->distinct()->get('gejala3');
        $gejala4 = DB::table('data_penyakit')->distinct()->get('gejala4');

        if (!empty($getDataDiri)) {            
            $data = [
                'title' => 'Pemeriksaan Kesehatan',
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->role,
                'gejala1' => $gejala1,
                'gejala2' => $gejala2,
                'gejala3' => $gejala3,
                'gejala4' => $gejala4,
            ];
        }
        elseif (empty($getDataDiri)) {
            return redirect('/user/data-diri')->with('error','Silahkan isi data diri terlebih dahulu');;
        }
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
    public function diagnose(Request $request){
        $id = $request->idUser;
        $gejala1 = $request->gejala1;
        $gejala2 = $request->gejala2;
        $gejala3 = $request->gejala3;
        $gejala4 = $request->gejala4;
        $dataPenyakit = new DataPenyakit;
        $user = new User;
        $dataUser = $user->firstWhere('id',$id);
        if ($gejala1 && $gejala2 && $gejala3 && $gejala4) {
            $getPenyakit = $dataPenyakit->firstWhere([
                'gejala1' => $gejala1,
                'gejala2' => $gejala2,
                'gejala3' => $gejala3,
                'gejala4' => $gejala4,
            ],$gejala1);
            if (!empty($getPenyakit->nama_penyakit)) {
                $gejala = $gejala1 .', '. $gejala2 .', '. $gejala3 .', '.$gejala4;
                $indikasiPenyakit = $getPenyakit->nama_penyakit;
                $saranDokter = $getPenyakit->saran_dokter;
            }
            elseif (empty($getPenyakit->nama_penyakit)) {
                $gejala = $gejala1 .', '. $gejala2 .', '. $gejala3 .', '.$gejala4;
                $indikasiPenyakit = "Tidak terindikasi";
                $saranDokter = "Anda tidak terindikasi penyakit lambung. Namun, jika kondisi memburuk, harap segera ke tenaga kesehatan terdekat";
            }
        }
        elseif ($gejala1 || $gejala2 || $gejala3 || $gejala4) {
            $gejala = $gejala1 . $gejala2 . $gejala3 . $gejala4;
            $indikasiPenyakit = "Penyakit tidak teridentifikasi";
            $saranDokter = "Jika kondisi memburuk, harap segera ke tenaga kesehatan terdekat";
            
        }
        $dataPemeriksaan = DataPemeriksaan::create([
            'user_id'=> $id,
            'nama' => $dataUser->name,
            'gejala' => $gejala,
            'indikasi_penyakit' => $indikasiPenyakit,
            'saran_dokter' => $saranDokter,
        ]);

        return redirect('/user/data-pemeriksaan')->with('success','Pemeriksaan kesehatan berhasil');

    }
    public function getSaranDokter(DataPemeriksaan $dataPemeriksaan){
        $id =  $_GET['id'];
        $getData = $dataPemeriksaan->firstWhere('id', $id) ;
        echo json_encode($getData);
    }
    public function getDataUser(DataDiri $dataDiri){
        $id =  $_GET['id'];
        $getData = $dataDiri->firstWhere('user_id', $id) ;
        $dataUser = User::firstWhere('id', $id) ;
        if (empty($getData)) {
            echo json_encode($dataUser);
        }
        elseif (!empty($getData)) {
            echo json_encode($getData);
        }
    }
    public function destroy(DataDiri $dataDiri, $id){
        $getId = $dataDiri->firstWhere('user_id', $id) ;
        $getDataDiri = DataDiri::find($getId->id);
        $delete = $getDataDiri->delete();
        return redirect()->back()->with('success','Hapus data diri berhasil');
    }
    public function update(Request $request, $id){
        $dataDiri = new DataDiri;
        $getDataDiri = $dataDiri->firstwhere('user_id',$id);
        if(empty($getDataDiri)){
            $save = DataDiri::create([
                'user_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
        }
        if(!empty($getDataDiri)){
            $update = $dataDiri->where('user_id',$id)
            ->update([
                'user_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
        }
        return redirect()->back()->with('success','Update data diri berhasil');
    }
}
