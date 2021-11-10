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
    public function index(DataDiri $dataDiri, DataPenyakit $dataPenyakit, DataPemeriksaan $dataPemeriksaan){
        $user = Auth::user();
        $kelengkapanDataDiri = $dataDiri->firstWhere('user_id', $user->id);
        $cekdataPemeriksaan = $dataPemeriksaan->firstWhere('user_id', $user->id);
        if (empty($cekdataPemeriksaan)) {
            $total = '0';
        }
        elseif (!empty($cekdataPemeriksaan)) {
            $totalPemeriksaan = $cekdataPemeriksaan->count();
            $total = $totalPemeriksaan;
        }
        if (!empty($kelengkapanDataDiri)) {
            $persentase = 100;
        }
        elseif (empty($kelengkapanDataDiri)) {
            $persentase = 25;
        }
        $data = [
            'title' => 'Dashboard User',
            'name' => $user->name,
            'role' => $user->role,
            'kelengkapanProfil' => $persentase,
            'dataPenyakit' => $dataPenyakit::all()->count(),
            'dataPemeriksaan' => $total,
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
        
        $getGejala1 = DB::table('data_penyakit')->select('gejala1')->get()->implode('gejala1', ', ');
        $getGejala2 = DB::table('data_penyakit')->select('gejala2')->get()->implode('gejala2', ', ');
        $getGejala3 = DB::table('data_penyakit')->select('gejala3')->get()->implode('gejala3', ', ');
        $getGejala4 = DB::table('data_penyakit')->select('gejala4')->get()->implode('gejala4', ', ');

        $gejala1 = array_unique(explode(', ',$getGejala1));
        $gejala2 = array_unique(explode(', ',$getGejala2));
        $gejala3 = array_unique(explode(', ',$getGejala3));
        $gejala4 = array_unique(explode(', ',$getGejala4));
        
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
    public function diagnose(Request $request, DataPenyakit $dataPenyakit, User $user){
        // get data input
        $id = $request->idUser;
        $inputGejala1 = $request->gejala1 ?? 'null';
        $inputGejala2 = $request->gejala2 ?? 'null';
        $inputGejala3 = $request->gejala3 ?? 'null';
        $inputGejala4 = $request->gejala4 ?? 'null';
        $dataUser = $user->firstWhere('id',$id);
        if ($inputGejala1 && $inputGejala2 && $inputGejala3 && $inputGejala4 !== 'null') {
            // conversion array to string
            $gejala1 = implode(', ', $inputGejala1);
            $gejala2 = implode(', ', $inputGejala2);
            $gejala3 = implode(', ', $inputGejala3);
            $gejala4 = implode(', ', $inputGejala4);
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
        elseif ($request->gejala1 || $request->gejala2 || $request->gejala3 || $request->gejala4) {
            $gejala1 = $inputGejala1 == 'null' ? ' ' : implode(', ', $inputGejala1);
            $gejala2 = $inputGejala2 == 'null' ? ' ' : implode(', ', $inputGejala2);
            $gejala3 = $inputGejala3 == 'null' ? ' ' : implode(', ', $inputGejala3);
            $gejala4 = $inputGejala4 == 'null' ? ' ' : implode(', ', $inputGejala4);
            $gejala = $gejala1 .' '. $gejala2 .' '. $gejala3 .' '.$gejala4;
            $indikasiPenyakit = "Penyakit tidak teridentifikasi";
            $saranDokter = "Jika kondisi memburuk, harap segera ke tenaga kesehatan terdekat";
        }
        elseif (empty($request->gejala1 && $request->gejala2 && $request->gejala3 && $request->gejala4)) {
            $gejala = "tidak bergejala";
            $indikasiPenyakit = "Tidak terindikasi";
            $saranDokter = "Anda tidak terindikasi penyakit lambung";
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
