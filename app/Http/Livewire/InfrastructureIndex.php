<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QRCodes;
use App\Models\Infrastructure;
use App\Models\Questionnaire;

class InfrastructureIndex extends Component
{
    public function render()
    {
        $school = request()->segment(2);
        $data_school = QRCodes::where('qr_page', $school)->with(['school'])->get();

        return view('livewire.infrastructure-index', [
            'question' => Questionnaire::get(),
            'infrastructure' => Infrastructure::where('school_id', $data_school[0]->school->id)->with('school')->get(),
            'qr_page' => $school
        ]);
    }

    public function handleStored()
    {
        session()->flash('success',  'Data berhasil disimpan!');
    }
}
