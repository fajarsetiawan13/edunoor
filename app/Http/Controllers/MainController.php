<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Infrastructure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd(Infrastructure::KepadatanSMP());
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

            if (auth()->user()->is_active == 0) {
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
}
