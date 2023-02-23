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
            'title' => 'DAFTAR SEKOLAH',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    public function school_profile($id)
    {
        return view('dashboard.school-profile', [
            'title' => 'DAFTAR SEKOLAH',
            'account' => User::where('id', auth()->user()->id),
            'school' => School::where('id', $id)->get(),
            'qrcode' => QRCodes::where('school_id', $id)->get()
        ]);
    }

    public function show_school($school)
    {
        $data_school = QRCodes::where('qr_page', $school)->with(['school'])->get();
        return view('dashboard.school-questionare', [
            'title' => 'Data Sekolah',
            'school' => $data_school,
            'infrastructure' => Infrastructure::where('school_id', $data_school[0]->school->id)->get()->toArray(),
            'question' => Questionnaire::all()
        ]);
    }

    public function show_student($student)
    {
        dd(QRCodes::where('qr_page', $student)->with(['student'])->get());
    }

    public function sch_infrastructure(Request $request)
    {
        Infrastructure::create([
            'school_id' => $request->school_id,
            'date_created' => Carbon::now(),
            'answer_1' => $request->answer_1, 'answer_2' => $request->answer_2, 'answer_3' => $request->answer_3,
            'answer_4' => $request->answer_4, 'answer_5' => $request->answer_5, 'answer_6' => $request->answer_6,
            'answer_7' => $request->answer_7, 'answer_8' => $request->answer_8, 'answer_9' => $request->answer_9,
            'answer_10' => $request->answer_10, 'answer_11' => $request->answer_11, 'answer_12' => $request->answer_12,
            'answer_13' => $request->answer_13, 'answer_14' => $request->answer_14, 'answer_15' => $request->answer_15,
            'answer_16' => $request->answer_16, 'answer_17' => $request->answer_17, 'answer_18' => $request->answer_18,
            'answer_19' => $request->answer_19, 'answer_20' => $request->answer_20, 'answer_21' => $request->answer_21,
            'answer_22' => $request->answer_22, 'answer_23' => $request->answer_23, 'answer_24' => $request->answer_24,
            'answer_25' => $request->answer_25, 'answer_26' => $request->answer_26, 'answer_27' => $request->answer_27,
            'answer_28' => $request->answer_28,
            'explanation_1' => $request->explanation_1, 'explanation_2' => $request->explanation_2, 'explanation_3' => $request->explanation_3,
            'explanation_4' => $request->explanation_4, 'explanation_5' => $request->explanation_5, 'explanation_6' => $request->explanation_6,
            'explanation_7' => $request->explanation_7, 'explanation_8' => $request->explanation_8, 'explanation_9' => $request->explanation_9,
            'explanation_10' => $request->explanation_10, 'explanation_11' => $request->explanation_11, 'explanation_12' => $request->explanation_12,
            'explanation_13' => $request->explanation_13, 'explanation_14' => $request->explanation_14, 'explanation_15' => $request->explanation_15,
            'explanation_16' => $request->explanation_16, 'explanation_17' => $request->explanation_17, 'explanation_18' => $request->explanation_18,
            'explanation_19' => $request->explanation_19, 'explanation_20' => $request->explanation_20, 'explanation_21' => $request->explanation_21,
            'explanation_22' => $request->explanation_22, 'explanation_23' => $request->explanation_23, 'explanation_24' => $request->explanation_24,
            'explanation_25' => $request->explanation_25, 'explanation_26' => $request->explanation_26, 'explanation_27' => $request->explanation_27,
            'explanation_28' => $request->explanation_28,
        ]);
        return back()->with('success', 'Data Kuesioner telah ditambahkan!');
    }

    public function sch_infrastructure_change(Request $request)
    {
        Infrastructure::where('school_id', $request->school_id)->update([
            'answer_1' => $request->answer_1, 'answer_2' => $request->answer_2, 'answer_3' => $request->answer_3,
            'answer_4' => $request->answer_4, 'answer_5' => $request->answer_5, 'answer_6' => $request->answer_6,
            'answer_7' => $request->answer_7, 'answer_8' => $request->answer_8, 'answer_9' => $request->answer_9,
            'answer_10' => $request->answer_10, 'answer_11' => $request->answer_11, 'answer_12' => $request->answer_12,
            'answer_13' => $request->answer_13, 'answer_14' => $request->answer_14, 'answer_15' => $request->answer_15,
            'answer_16' => $request->answer_16, 'answer_17' => $request->answer_17, 'answer_18' => $request->answer_18,
            'answer_19' => $request->answer_19, 'answer_20' => $request->answer_20, 'answer_21' => $request->answer_21,
            'answer_22' => $request->answer_22, 'answer_23' => $request->answer_23, 'answer_24' => $request->answer_24,
            'answer_25' => $request->answer_25, 'answer_26' => $request->answer_26, 'answer_27' => $request->answer_27,
            'answer_28' => $request->answer_28,
            'explanation_1' => $request->explanation_1, 'explanation_2' => $request->explanation_2, 'explanation_3' => $request->explanation_3,
            'explanation_4' => $request->explanation_4, 'explanation_5' => $request->explanation_5, 'explanation_6' => $request->explanation_6,
            'explanation_7' => $request->explanation_7, 'explanation_8' => $request->explanation_8, 'explanation_9' => $request->explanation_9,
            'explanation_10' => $request->explanation_10, 'explanation_11' => $request->explanation_11, 'explanation_12' => $request->explanation_12,
            'explanation_13' => $request->explanation_13, 'explanation_14' => $request->explanation_14, 'explanation_15' => $request->explanation_15,
            'explanation_16' => $request->explanation_16, 'explanation_17' => $request->explanation_17, 'explanation_18' => $request->explanation_18,
            'explanation_19' => $request->explanation_19, 'explanation_20' => $request->explanation_20, 'explanation_21' => $request->explanation_21,
            'explanation_22' => $request->explanation_22, 'explanation_23' => $request->explanation_23, 'explanation_24' => $request->explanation_24,
            'explanation_25' => $request->explanation_25, 'explanation_26' => $request->explanation_26, 'explanation_27' => $request->explanation_27,
            'explanation_28' => $request->explanation_28,
        ]);
        return back()->with('success', 'Data Kuesioner telah diubah!');
    }
}
