<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Setting;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'Daftar Pengguna Sistem',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function setting()
    {
        return view('dashboard.setting', [
            'title' => 'Pengaturan Web',
            'account' => User::where('id', auth()->user()->id),
            'setting' => Setting::all()
        ]);
    }

    public function setting_store(Request $request)
    {
        $data = $request->validate([
            'pemantauan_kasus' => 'required',
            'pemantauan_kontak_erat' => 'required'
        ]);
        Setting::create($data);
        return back()->with('success', 'Pengaturan telah berhasil diubah!');
    }
    public function setting_update(Request $request)
    {
        Setting::where('id', 1)->update([
            'pemantauan_kasus' => $request->pemantauan_kasus,
            'pemantauan_kontak_erat' => $request->pemantauan_kontak_erat
        ]);
        return back()->with('success', 'Pengaturan telah berhasil diubah!');
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Articles::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
