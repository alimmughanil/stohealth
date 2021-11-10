<?php

namespace Database\Seeders;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => '1',
            'password' => Hash::make('rahasia123'),
        ]);
        User::create([
            'name' => 'Budi Setiaji',
            'email' => 'user@user.com',
            'role' => '2',
            'password' => Hash::make('rahasia123'),
        ]);
        $daftarGejala = [
            'mules',
            'kembung',
            'sendawa berlebih',
            'demam',
            'diare',
            'pembengkakan di area perut',
            'mual',
            'sakit kepala',
            'penurunan berat badan',
            'susah bab',
            'kesulitan menelan',
            'cepat kenyang',
            'kehilangan nafsu makan',
            'rasa perih pada perut',
            'bab berdarah',
            'badan cepat lelah',
            'nyeri dada',
            'tinja berwarna gelap',
            'sesak nafas',
            'sakit tenggorokan',
            'muntah',
            'lidah seperti berlapis lendir',
            'bau nafas tidak sedap',
            'kram perut',
            'radang lambung',
            'mulut terasa pahit',
            'muntah darah',
            'sakit perut bagian atas (ulu hati)',
            'cegukan',
            'tubuh terasa lemah',
            'suara serak',
        ];
        foreach ($daftarGejala as $gejala) {
            DataGejala::create([
                'gejala' => $gejala,
            ]);        
        }

        DataPenyakit::create([
            'nama_penyakit' => 'GERD',
            'gejala1' => 'kembung, demam, mual',
            'gejala2' => 'kesulitan menelan, rasa perih pada perut',
            'gejala3' => 'nyeri dada, sesak nafas, sakit tenggorokan, lidah seperti berlapis lendir, bau nafas tidak sedap',
            'gejala4' => 'mulut terasa pahit, muntah darah, suara serak',
            'saran_dokter' => 
'1. Merubah Pola Hidup Menjadi Lebih Sehat, 
2. Berhenti Merokok, 
3. Hindari Berbaring setelah makan, 
4. Hindari makan dengan jumlah Porsi yang besar, 
5. Hindari Obesitas, 
6. Hindari stress, 
7. Istirahat cukup, 
8. Olahraga teratur, 
9. Segera datang ke Puskesmas atau Klinik terdekat untuk mendapatkan penanganan medis jika mengalami sakit GERD.

Pengobatan: 
antasida, PPI (Proton Pump Inhibitor) seperti, omeprazol, lansoprazol, dan Penghambat reseptor H2 seperti Ranitidin, dan prokinetik seperti domperidon',]);
        DataPenyakit::create([
            'nama_penyakit' => 'Kolik Abdomen',
            'gejala1' => 'mual, mules, sendawa berlebih',
            'gejala2' => 'rasa perih pada perut, susah bab, bab berdarah',            
            'gejala3' => 'tinja berwarna gelap, muntah',            
            'gejala4' => 'muntah darah',
            'saran_dokter' => 
'1. Tidur dan istirahat cukup, 
2. Makan makanan bergizi, 
3. Minum air dalam jumlah cukup,
4. Olahraga rutin, 
5. Menghindari rokok dan alkohol, 
6. Bila nyeri dapat diberikan obat anti
nyeri dan mengompres perut dengan air hangat. 

Pengobatan: 
koreksi dehidrasi, beri obat nyeri (Asam Mefenamat), bila tidak membaik, Segera Konsultasi ke Puskesmas atau Klinik terdekat untuk dirujuk ke Rumah Sakit.',]);

        DataPenyakit::create([
            'nama_penyakit' => 'Kanker Lambung',
            'gejala1' => 'kembung, demam, mual, mules, pembengkakan di area perut',
            'gejala2' => 'kesulitan menelan, penurunan berat badan, cepat kenyang, kehilangan nafsu makan',            
            'gejala3' => 'nyeri dada, sesak nafas, tinja berwarna gelap, badan cepat lelah',            
            'gejala4' => 'muntah darah, sakit perut bagian atas (ulu hati), tubuh terasa lemah',
            'saran_dokter' => 
'1. Rajin Berolahraga, 
2. Perbanyak minum air putih, 
3. Perbanyak konsumsi buah dan sayur,
4. Jangan merokok, 
5. Hindari mengkonsumsi makanan yang di awetkan, 
6. Hindari makan daging yang di goreng dan dibakar, 
7. Segera Ke Klinik atau Puskesmas terdekat untuk mendapatkan penanganan medis jika mengalami sakit kanker lambung. 

Pengobatan:
Radioterapi, Kemoterapi, dan Operasi.',]);
        DataPenyakit::create([
            'nama_penyakit' => 'Appendicitis',
            'gejala1' => 'mual, mules, sendawa berlebih, pembengkakan di area perut, diare',            
            'gejala2' => 'rasa perih pada perut, kehilangan nafsu makan',
            'gejala3' => 'muntah',            
            'gejala4' => 'tidak ada',            
            'saran_dokter' => 
'1. Konsumsi makanan berserat, 
2.Jangan tunda buang air besar (BAB), 
3. Batasi asupan kafein dan alkohol, 
4. Banyak konsumsi air putih, 
5. Kurangi makan pedas, santan dan berlemak,
6. hindari stress, 
7. Olahraga teratur, 
8. Segera datang ke Puskesmas atau Klinik terdekat untuk mendapatkan penanganan lebih lanjut. 

Pengobatan : 
Pemberian antibiotik seperti metronidazole dan ciprofloxacin, pemberian obat imunosupresan seperti azathioprine, cyclosporine, dan infliximab, dan pemberian OAINS seperti kortikosteroid.'
,]);
        DataPenyakit::create([
            'nama_penyakit' => 'Gastritis',
            'gejala1' => 'kembung, demam, pembengkakan di area perut',
            'gejala2' => 'rasa perih pada perut, cepat kenyang, kehilangan nafsu makan',
            'gejala3' => 'tinja berwarna gelap, muntah',
            'gejala4' => 'tubuh terasa lemah, radang lambung',
            'saran_dokter' => 
'1. Mengganti Kebiasaan Makan, 
2. Menghindari minuman beralkohol, 
3. Hindari makanan pedas dan asam dan mengandung gas, 
4. Kurangi atau hindari konsumsi kopi, teh, dan minuman bersoda, 
5. Usahakan jadwal makan teratur dan jangan sampai terlambat, 
6. Kelola stres dengan baik melalui olahraga, metode relaksasi atau kegiatan lain yang disukai,
7. Segera Konsultasi ke Klinik atau Puskesmas Terdekat untuk mendapatkan penanganan medis.

Pengobatan : 
Obat Antasida Doen, Obat Ranitidin, Omeprazole, dan Promag.'
,]);
        DataPenyakit::create([
            'nama_penyakit' => 'Gastroenteritis',
            'gejala1' => 'demam, mules, sendawa berlebih, diare',
            'gejala2' => 'rasa perih pada perut, bab berdarah, kehilangan nafsu makan',
            'gejala3' => 'muntah, badan cepat lelah',
            'gejala4' => 'tubuh terasa lemah, kram perut',
            'saran_dokter' => 
'1. Mencuci tangan dengan air mengalir dan sabun setiap kali sebelum makan, 
2. Memilih makanan yang higienis untuk dikonsumsi, 
3. Gunakan tisue untuk mengeringkan tangan,
4. Pastikan Makanan yang dimasak sudah matang, 5. Bersihkan kamar mandi dan toilet secara teratur, 
6. Banyak Minum air Putih, 
7. Banyak Istirahat, Hindari susu, alkohol dan kafein,
8. Konsultasikan Ke Klinik atau Puskesmas terdekat untuk mendapatkan penanganan medis secara lebih lanjut. 

Pengobatan : 
oralit, obat anti diare seperti loperamide.'
,]);

    }
}
