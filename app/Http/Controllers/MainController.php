<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Infrastructure;
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
        $data = [
            Infrastructure::HighSchool_A()->values(), Infrastructure::HighSchool_B()->values(),
            Infrastructure::HighSchool_C()->values(), Infrastructure::HighSchool_D()->values(),
            Infrastructure::HighSchool_E()->values(),
        ];
        $labels = [
            Infrastructure::HighSchool_A()->keys(), Infrastructure::HighSchool_B()->keys(),
            Infrastructure::HighSchool_C()->keys(), Infrastructure::HighSchool_D()->keys(),
            Infrastructure::HighSchool_E()->keys(),
        ];
        return view('main.statistics', [
            'title' => 'Statistik Data Kesehatan Sekolah | Sistem Basis Data Sekolah',
            'labels_a' => $labels[0], 'data_a' => $data[0],
            'labels_b' => $labels[1], 'data_b' => $data[1],
            'labels_c' => $labels[2], 'data_c' => $data[2],
            'labels_d' => $labels[3], 'data_d' => $data[3],
            'labels_e' => $labels[4], 'data_e' => $data[4],
            'infrastructures' => Infrastructure::select(
                'school_id',
                'answer_10',
                'explanation_10',
                'answer_11',
                'explanation_11',
                'answer_12',
                'explanation_12',
                'answer_13',
                'explanation_13',
                'answer_14',
                'explanation_14',
                'answer_15',
                'explanation_15',
                'answer_16',
                'explanation_16',
                'answer_17',
                'explanation_17',
                'answer_18',
                'explanation_18',
                'answer_19',
                'explanation_19',
                'answer_20',
                'explanation_20',
                'answer_21',
                'explanation_21',
                'answer_22',
                'explanation_22',
                'answer_23',
                'explanation_23',
                'answer_24',
                'explanation_24',
                'answer_25',
                'explanation_25',
                'answer_26',
                'explanation_26',
                'answer_27',
                'explanation_27',
            )->with('school')->get()
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
