<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Infrastructure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Object_;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index', [
            'title' => 'Sistem Basis Data Sekolah',
            'articles' => Articles::latest()->get()
        ]);
    }

    public function articles()
    {
        return view('main.articles', [
            'title' => 'Artikel | Sistem Basis Data Sekolah',
            'articles' => Articles::latest()->paginate(9)
        ]);
    }

    public function articles_show(Articles $article)
    {
        return view('main.articles_show', [
            'title' => 'Artikel | ' . $article->title,
            'article' => $article,
            'articles' => Articles::latest()->get()
        ]);
    }

    public function about()
    {
        return view('main.about', [
            'title' => 'Tentang Sistem | Sistem Basis Data Sekolah',
        ]);
    }

    public function statistics()
    {
        $data = [
            Infrastructure::LuasSekolahSD()->values(),
            Infrastructure::LuasSekolahSMP()->values(),
            Infrastructure::LuasSekolahSMA()->values(),
            Infrastructure::RuangTerbukaSekolahSD()->values(),
            Infrastructure::RuangTerbukaSekolahSMP()->values(),
            Infrastructure::RuangTerbukaSekolahSMA()->values(),
            Infrastructure::RuangKelasSD()->values(),
            Infrastructure::RuangKelasSMP()->values(),
            Infrastructure::RuangKelasSMA()->values(),
            Infrastructure::LuasKelasSD()->values(),
            Infrastructure::LuasKelasSMP()->values(),
            Infrastructure::LuasKelasSMA()->values(),
            Infrastructure::VentilasiKelasSD()->values(),
            Infrastructure::VentilasiKelasSMP()->values(),
            Infrastructure::VentilasiKelasSMA()->values(),
            Infrastructure::KepadatanSD()->values(),
            Infrastructure::KepadatanSMP()->values(),
            Infrastructure::KepadatanSMA()->values(),
            Infrastructure::KepadatanPopulasiSD()->values(),
            Infrastructure::KepadatanPopulasiSMP()->values(),
            Infrastructure::KepadatanPopulasiSMA()->values(),
        ];
        $labels = [
            Infrastructure::LuasSekolahSD()->keys(),
            Infrastructure::LuasSekolahSMP()->keys(),
            Infrastructure::LuasSekolahSMA()->keys(),
            Infrastructure::RuangTerbukaSekolahSD()->keys(),
            Infrastructure::RuangTerbukaSekolahSMP()->keys(),
            Infrastructure::RuangTerbukaSekolahSMA()->keys(),
            Infrastructure::RuangKelasSD()->keys(),
            Infrastructure::RuangKelasSMP()->keys(),
            Infrastructure::RuangKelasSMA()->keys(),
            Infrastructure::LuasKelasSD()->keys(),
            Infrastructure::LuasKelasSMP()->keys(),
            Infrastructure::LuasKelasSMA()->keys(),
            Infrastructure::VentilasiKelasSD()->keys(),
            Infrastructure::VentilasiKelasSMP()->keys(),
            Infrastructure::VentilasiKelasSMA()->keys(),
            Infrastructure::KepadatanSD()->keys(),
            Infrastructure::KepadatanSMP()->keys(),
            Infrastructure::KepadatanSMA()->keys(),
            Infrastructure::KepadatanPopulasiSD()->keys(),
            Infrastructure::KepadatanPopulasiSMP()->keys(),
            Infrastructure::KepadatanPopulasiSMA()->keys(),
        ];
        for ($i = 0; $i < count($data[0]); $i++) {
            $batas_SD[$i] = 28;
        }
        for ($i = 0; $i < count($data[1]); $i++) {
            $batas_SMP[$i] = 32;
        }
        for ($i = 0; $i < count($data[2]); $i++) {
            $batas_SMA[$i] = 36;
        }

        $data_sd = MainController::skor_sekolah(Infrastructure::Basis_Data_SD()->get());
        $data_smp = MainController::skor_sekolah(Infrastructure::Basis_Data_SMP()->get());
        $data_sma = MainController::skor_sekolah(Infrastructure::Basis_Data_SMA()->get());
        // dd([$data_sd, $data_smp, $data_sma]);

        return view('main.statistics', [
            'title' => 'Statistik Data Kesehatan Sekolah | Sistem Basis Data Sekolah',
            'setting' => Setting::all(),
            'labels_luas_sekolah_SD' => $labels[0], 'luas_SD' => $data[0],
            'labels_luas_sekolah_SMP' => $labels[1], 'luas_SMP' => $data[1],
            'labels_luas_sekolah_SMA' => $labels[2], 'luas_SMA' => $data[2],
            'labels_ruang_terbuka_SD' => $labels[3], 'ruang_terbuka_SD' => $data[3],
            'labels_ruang_terbuka_SMP' => $labels[4], 'ruang_terbuka_SMP' => $data[4],
            'labels_ruang_terbuka_SMA' => $labels[5], 'ruang_terbuka_SMA' => $data[5],
            'labels_ruang_kelas_SD' => $labels[6], 'ruang_kelas_SD' => $data[6],
            'labels_ruang_kelas_SMP' => $labels[7], 'ruang_kelas_SMP' => $data[7],
            'labels_ruang_kelas_SMA' => $labels[8], 'ruang_kelas_SMA' => $data[8],
            'labels_luas_kelas_SD' => $labels[9], 'luas_kelas_SD' => $data[9],
            'labels_luas_kelas_SMP' => $labels[10], 'luas_kelas_SMP' => $data[10],
            'labels_luas_kelas_SMA' => $labels[11], 'luas_kelas_SMA' => $data[11],
            'labels_ventilasi_kelas_SD' => $labels[12], 'ventilasi_kelas_SD' => $data[12],
            'labels_ventilasi_kelas_SMP' => $labels[13], 'ventilasi_kelas_SMP' => $data[13],
            'labels_ventilasi_kelas_SMA' => $labels[14], 'ventilasi_kelas_SMA' => $data[14],
            'basis_data_sd' => Infrastructure::Basis_Data_SD()->get(),
            'basis_data_smp' => Infrastructure::Basis_Data_SMP()->get(),
            'basis_data_sma' => Infrastructure::Basis_Data_SMA()->get(),
            'labels_kepadatan_SD' => $labels[15], 'kepadatan_SD' => $data[15], 'batas_SD' => $batas_SD,
            'labels_kepadatan_SMP' => $labels[16], 'kepadatan_SMP' => $data[16], 'batas_SMP' => $batas_SMP,
            'labels_kepadatan_SMA' => $labels[17], 'kepadatan_SMA' => $data[17], 'batas_SMA' => $batas_SMA,
            'labels_kepadatan_populasi_SD' => $labels[18], 'kepadatan_populasi_SD' => $data[18],
            'labels_kepadatan_populasi_SMP' => $labels[19], 'kepadatan_populasi_SMP' => $data[19],
            'labels_kepadatan_populasi_SMA' => $labels[20], 'kepadatan_populasi_SMA' => $data[20],
            'skor_sd' => $data_sd, 'skor_smp' => $data_smp, 'skor_sma' => $data_sma
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->is_active != 1) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/')->with('error', 'Akun Anda tidak aktif, mohon tunggu admin memverifikasi akun Anda terlebih dulu.');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau password Anda tidak sesuai dengan yang terdaftar dalam sistem.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function skor_sekolah(Object $data)
    {
        for ($i = 0; $i < $data->count(); $i++) {
            $x = 0;
            // Kepadatan Kelas
            if ((($data[$i]->B2 / $data[$i]->A3) / $data[$i]->A4) <= 0.1) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Sabun Cuci Tangan
            if (($data[$i]->C4 / $data[$i]->A3) >= 1) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Handsanitizer
            if (($data[$i]->C7 / $data[$i]->A3) >= 1) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Tempat Cuci tangan
            if (($data[$i]->C6 / $data[$i]->A3 >= 1)) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Thermogun
            if ($data[$i]->C8 >= 1) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ventilasi
            if ((($data[$i]->A5 / $data[$i]->A4) * 100) >= 10) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Masker cadangan 
            if ((($data[$i]->C9 / $data[$i]->B2) * 100) >= 50) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Kepadatan Populasi sekolah 
            // if(($data[$i]->B2 / $data[$i]->A1) =){
            //     $x += 1;
            // } else {
            //     $x += 0;
            // }
            // Disinfektan Toilet
            if ($data[$i]->C5 >= 1) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Jumlah Toilet 
            if ((($data[$i]->B3 / 40) >= $data[$i]->C1 || ($data[$i]->B4 / 25) >= $data[$i]->C2)) {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Air di Toilet
            if ($data[$i]->C3 == 'Baik' || $data[$i]->C3 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketaatan Penggunaan Masker
            if ($data[$i]->C10 == 'Baik' || $data[$i]->C10 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Satgas Covid-19
            if ($data[$i]->D1 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Sosialisasi Protokol Kesehatan
            if ($data[$i]->D2 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Prosedur Penanganan Covid-19
            if ($data[$i]->D3 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Media Informasi Covid-19
            if ($data[$i]->D4 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Peraturan/Tata Tertib Covid-19
            if ($data[$i]->D5 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Ketersediaan Kantin Sehat
            if ($data[$i]->D6 == 'Ya') {
                $x += 1;
            } else {
                $x += 0;
            }
            // Data Covid-19 Setahun Terakhir
            if ($data[$i]->E1 < 1) {
                $x += 1;
            } else {
                $x += 0;
            }

            $skor[$i] = [$data[$i]->school, $x, round((($x / 18) * 100), 2)];
        }
        return $skor;
    }
}
