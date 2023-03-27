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
            Infrastructure::KepadatanSD()->values(),
            Infrastructure::KepadatanSMP()->values(),
            Infrastructure::KepadatanSMA()->values(),
        ];
        $labels = [
            Infrastructure::KepadatanSD()->keys(),
            Infrastructure::KepadatanSMP()->keys(),
            Infrastructure::KepadatanSMA()->keys(),
        ];
        for ($i = 0; $i < count($data[0]); $i++) {
            $batas_SD[$i] = 24;
        }
        for ($i = 0; $i < count($data[1]); $i++) {
            $batas_SMP[$i] = 33;
        }
        for ($i = 0; $i < count($data[2]); $i++) {
            $batas_SMA[$i] = 36;
        }

        return view('main.statistics', [
            'title' => 'Statistik Data Kesehatan Sekolah | Sistem Basis Data Sekolah',
            'setting' => Setting::all(),
            'labels_kepadatan_siswa_SD' => $labels[0], 'data_SD' => $data[0], 'batas_SD' => $batas_SD,
            'labels_kepadatan_siswa_SMP' => $labels[1], 'data_SMP' => $data[1], 'batas_SMP' => $batas_SMP,
            'labels_kepadatan_siswa_SMA' => $labels[2], 'data_SMA' => $data[2], 'batas_SMA' => $batas_SMA,
            'ventilasi_SD' => Infrastructure::VentilasiSD()->get(),
            'ventilasi_SMP' => Infrastructure::VentilasiSMP()->get(),
            'ventilasi_SMA' => Infrastructure::VentilasiSMA()->get(),
            'tempat_cuci_tangan_SD' => Infrastructure::TempatCuciTanganSD()->get(),
            'tempat_cuci_tangan_SMP' => Infrastructure::TempatCuciTanganSMP()->get(),
            'tempat_cuci_tangan_SMA' => Infrastructure::TempatCuciTanganSMA()->get(),
            'sabun_cuci_tangan_SD' => Infrastructure::SabunCuciTanganSD()->get(),
            'sabun_cuci_tangan_SMP' => Infrastructure::SabunCuciTanganSMP()->get(),
            'sabun_cuci_tangan_SMA' => Infrastructure::SabunCuciTanganSMA()->get(),
            'air_toilet_SD' => Infrastructure::AirToiletSD()->get(),
            'air_toilet_SMP' => Infrastructure::AirToiletSMP()->get(),
            'air_toilet_SMA' => Infrastructure::AirToiletSMA()->get(),
            'handsanitizer_SD' => Infrastructure::HandsanitizerSD()->get(),
            'handsanitizer_SMP' => Infrastructure::HandsanitizerSMP()->get(),
            'handsanitizer_SMA' => Infrastructure::HandsanitizerSMA()->get(),
            'masker_SD' => Infrastructure::MaskerSD()->get(),
            'masker_SMP' => Infrastructure::MaskerSMP()->get(),
            'masker_SMA' => Infrastructure::MaskerSMA()->get(),
            'ketaatan_masker_SD' => Infrastructure::KetaatanMaskerSD()->get(),
            'ketaatan_masker_SMP' => Infrastructure::KetaatanMaskerSMP()->get(),
            'ketaatan_masker_SMA' => Infrastructure::KetaatanMaskerSMA()->get(),
            'thermogun_SD' => Infrastructure::ThermogunSD()->get(),
            'thermogun_SMP' => Infrastructure::ThermogunSMP()->get(),
            'thermogun_SMA' => Infrastructure::ThermogunSMA()->get(),
            'satgas_covid_SD' => Infrastructure::SatgasCovidSD()->get(),
            'satgas_covid_SMP' => Infrastructure::SatgasCovidSMP()->get(),
            'satgas_covid_SMA' => Infrastructure::SatgasCovidSMA()->get(),
            'protokol_kesehatan_SD' => Infrastructure::ProtokolKesehatanSD()->get(),
            'protokol_kesehatan_SMP' => Infrastructure::ProtokolKesehatanSMP()->get(),
            'protokol_kesehatan_SMA' => Infrastructure::ProtokolKesehatanSMA()->get(),
            'prosedur_covid_SD' => Infrastructure::ProsedurCovidSD()->get(),
            'prosedur_covid_SMP' => Infrastructure::ProsedurCovidSMP()->get(),
            'prosedur_covid_SMA' => Infrastructure::ProsedurCovidSMA()->get(),
            'media_informasi_SD' => Infrastructure::MediaInformasiSD()->get(),
            'media_informasi_SMP' => Infrastructure::MediaInformasiSMP()->get(),
            'media_informasi_SMA' => Infrastructure::MediaInformasiSMA()->get(),
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
