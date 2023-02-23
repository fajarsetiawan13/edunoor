<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'DASHBOARD',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'DAFTAR PENGGUNA SISTEM',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function setting()
    {
        return view('dashboard.setting', [
            'title' => 'Pengaturan Web',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function questionare()
    {
        return view('dashboard.questionare', [
            'title' => 'Daftar Pertanyaaan Wawancara dan Observasi',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Articles::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
