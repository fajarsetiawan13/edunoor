<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use App\Models\QRCodes;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Students;
use App\Models\User;
use Carbon\Carbon;

class SchoolController extends Controller
{
    public function index()
    {
        return view('dashboard.schools', [
            'title' => 'Daftar Sekolah',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function school_profile($id)
    {
        $data_school =  School::where('id', $id)->get();
        return view('dashboard.school-profile', [
            'title' => 'Profil ' . $data_school[0]->name,
            'account' => User::where('id', auth()->user()->id),
            'school' => $data_school,
            'qrcode' => QRCodes::where('school_id', $id)->get()
        ]);
    }

    public function show_school()
    {
        return view('dashboard.school-questionare', [
            'title' => 'Basis Data Surveilans Covid-19 dan Sarana Prasarana Sekolah',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function edit_infrastructure()
    {
        $school = request()->segment(2);
        $data_school = QRCodes::where('qr_page', $school)->with(['school'])->get();

        return view('dashboard.school-questionare-edit', [
            'title' => 'Basis Data Surveilans Covid-19 dan Sarana Prasarana Sekolah',
            'account' => User::where('id', auth()->user()->id),
            'infrastructure' => Infrastructure::where('school_id', $data_school[0]->school->id)->get(),
            'schools' => School::all(),
            'question' => Questionnaire::all(),
            'qr_page' => $school,
        ]);
    }

    public function change_infrastructure(Request $request)
    {
        $school = request()->segment(2);
        Infrastructure::where('school_id', $request->school_id)->update([
            'school_address' => $request->school_address,
            'school_bp' => $request->school_bp,
            'A1' => $request->A1, 'explanation_A1' => $request->explanation_A1,
            'A2' => $request->A2, 'explanation_A2' => $request->explanation_A2,
            'A3' => $request->A3, 'explanation_A3' => $request->explanation_A3,
            'A4' => $request->A4, 'explanation_A4' => $request->explanation_A4,
            'A5' => $request->A5, 'explanation_A5' => $request->explanation_A5,
            'B1' => $request->B1, 'explanation_B1' => $request->explanation_B1,
            'B2' => $request->B2, 'explanation_B2' => $request->explanation_B2,
            'B3' => $request->B3, 'explanation_B3' => $request->explanation_B3,
            'B4' => $request->B4, 'explanation_B4' => $request->explanation_B4,
            'B5' => $request->B5, 'explanation_B5' => $request->explanation_B5,
            'C1' => $request->C1, 'explanation_C1' => $request->explanation_C1,
            'C2' => $request->C2, 'explanation_C2' => $request->explanation_C2,
            'C3' => $request->C3, 'explanation_C3' => $request->explanation_C3,
            'C4' => $request->C4, 'explanation_C4' => $request->explanation_C4,
            'C5' => $request->C5, 'explanation_C5' => $request->explanation_C5,
            'C6' => $request->C6, 'explanation_C6' => $request->explanation_C6,
            'C7' => $request->C7, 'explanation_C7' => $request->explanation_C7,
            'C8' => $request->C8, 'explanation_C8' => $request->explanation_C8,
            'C9' => $request->C9, 'explanation_C9' => $request->explanation_C9,
            'C10' => $request->C10, 'explanation_C10' => $request->explanation_C10,
            'D1' => $request->D1, 'explanation_D1' => $request->explanation_D1,
            'D2' => $request->D2, 'explanation_D2' => $request->explanation_D2,
            'D3' => $request->D3, 'explanation_D3' => $request->explanation_D3,
            'D4' => $request->D4, 'explanation_D4' => $request->explanation_D4,
            'D5' => $request->D5, 'explanation_D5' => $request->explanation_D5,
            'D6' => $request->D6, 'explanation_D6' => $request->explanation_D6,
            'E1' => $request->E1, 'explanation_E1' => $request->explanation_E1,
            'E2' => $request->E2, 'explanation_E2' => $request->explanation_E2,
            'E3' => $request->E3, 'explanation_E3' => $request->explanation_E3,
            'notes' => $request->notes,
        ]);

        return redirect('/sch' . '/' . $school)->with('success', 'Data berhasil diubah!');
    }

    public function show_student($student)
    {
        dd(QRCodes::where('qr_page', $student)->with(['student'])->get());
    }

    public function questionare()
    {
        return view('dashboard.questionare', [
            'title' => 'Daftar Wawancara dan Observasi',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }
}
