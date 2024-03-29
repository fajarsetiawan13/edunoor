<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;
use App\Models\QRCodes;
use App\Models\Infrastructure;
use App\Models\Questionnaire;
use Carbon\Carbon;

class InfrastructureCreate extends Component
{
    public $total_step = 6;
    public $current_step = 1;
    public $school_id, $school_address, $school_bp;

    public $A1, $A2, $A3, $A4, $A5, $B1, $B2, $B3, $B4, $B5;
    public $C1, $C2, $C3, $C4, $C5, $C6, $C7, $C8, $C9, $C10;
    public $D1, $D2, $D3, $D4, $D5, $D6, $E1, $E2, $E3, $notes;

    public $explanation_A1, $explanation_A2, $explanation_A3, $explanation_A4, $explanation_A5;
    public $explanation_B1, $explanation_B2, $explanation_B3, $explanation_B4, $explanation_B5;
    public $explanation_C1, $explanation_C2, $explanation_C3, $explanation_C4, $explanation_C5;
    public $explanation_C6, $explanation_C7, $explanation_C8, $explanation_C9, $explanation_C10;
    public $explanation_D1, $explanation_D2, $explanation_D3;
    public $explanation_D4, $explanation_D5, $explanation_D6;
    public $explanation_E1, $explanation_E2, $explanation_E3;

    public function mount()
    {
        $this->current_step = 1;
    }

    public function render()
    {
        return view('livewire.infrastructure-create', [
            'question' => Questionnaire::all(),
            'schools' => School::all()
        ]);
    }

    public function store()
    {
        $data = Infrastructure::create([
            'school_id' => $this->school_id,
            'school_address' => $this->school_address,
            'school_bp' => $this->school_bp,
            'A1' => $this->A1, 'explanation_A1' => $this->explanation_A1,
            'A2' => $this->A2, 'explanation_A2' => $this->explanation_A2,
            'A3' => $this->A3, 'explanation_A3' => $this->explanation_A3,
            'A4' => $this->A4, 'explanation_A4' => $this->explanation_A4,
            'A5' => $this->A5, 'explanation_A5' => $this->explanation_A5,
            'B1' => $this->B1, 'explanation_B1' => $this->explanation_B1,
            'B2' => $this->B2, 'explanation_B2' => $this->explanation_B2,
            'B3' => $this->B3, 'explanation_B3' => $this->explanation_B3,
            'B4' => $this->B4, 'explanation_B4' => $this->explanation_B4,
            'B5' => $this->B5, 'explanation_B5' => $this->explanation_B5,
            'C1' => $this->C1, 'explanation_C1' => $this->explanation_C1,
            'C2' => $this->C2, 'explanation_C2' => $this->explanation_C2,
            'C3' => $this->C3, 'explanation_C3' => $this->explanation_C3,
            'C4' => $this->C4, 'explanation_C4' => $this->explanation_C4,
            'C5' => $this->C5, 'explanation_C5' => $this->explanation_C5,
            'C6' => $this->C6, 'explanation_C6' => $this->explanation_C6,
            'C7' => $this->C7, 'explanation_C7' => $this->explanation_C7,
            'C8' => $this->C8, 'explanation_C8' => $this->explanation_C8,
            'C9' => $this->C9, 'explanation_C9' => $this->explanation_C9,
            'C10' => $this->C10, 'explanation_C10' => $this->explanation_C10,
            'D1' => $this->D1, 'explanation_D1' => $this->explanation_D1,
            'D2' => $this->D2, 'explanation_D2' => $this->explanation_D2,
            'D3' => $this->D3, 'explanation_D3' => $this->explanation_D3,
            'D4' => $this->D4, 'explanation_D4' => $this->explanation_D4,
            'D5' => $this->D5, 'explanation_D5' => $this->explanation_D5,
            'D6' => $this->D6, 'explanation_D6' => $this->explanation_D6,
            'E1' => $this->E1, 'explanation_E1' => $this->explanation_E1,
            'E2' => $this->E2, 'explanation_E2' => $this->explanation_E2,
            'E3' => $this->E3, 'explanation_E3' => $this->explanation_E3,
            'notes' => $this->notes,
        ]);
        $this->emit('infrastructureStored', $data);
        $this->resetInput();
        $this->dispatchBrowserEvent('refresh-page');
    }

    public function decreaseStep()
    {
        $this->current_step--;
        if ($this->current_step < 1) {
            $this->current_step = 1;
        }
    }

    public function increaseStep()
    {
        $this->current_step++;
        if ($this->current_step > $this->total_step) {
            $this->current_step = $this->total_step;
        }
    }

    public function resetInput()
    {
        $this->A1 = null;
        $this->A2 = null;
        $this->A3 = null;
        $this->A4 = null;
        $this->A5 = null;
        $this->B1 = null;
        $this->B2 = null;
        $this->B3 = null;
        $this->B4 = null;
        $this->B5 = null;
        $this->C1 = null;
        $this->C2 = null;
        $this->C3 = null;
        $this->C4 = null;
        $this->C5 = null;
        $this->C6 = null;
        $this->C7 = null;
        $this->C8 = null;
        $this->C9 = null;
        $this->C10 = null;
        $this->D1 = null;
        $this->D2 = null;
        $this->D3 = null;
        $this->D4 = null;
        $this->D5 = null;
        $this->D6 = null;
        $this->E1 = null;
        $this->E2 = null;
        $this->E3 = null;
        $this->explanation_A1 = null;
        $this->explanation_A2 = null;
        $this->explanation_A3 = null;
        $this->explanation_A4 = null;
        $this->explanation_A5 = null;
        $this->explanation_B1 = null;
        $this->explanation_B2 = null;
        $this->explanation_B3 = null;
        $this->explanation_B4 = null;
        $this->explanation_B5 = null;
        $this->explanation_C1 = null;
        $this->explanation_C2 = null;
        $this->explanation_C3 = null;
        $this->explanation_C4 = null;
        $this->explanation_C5 = null;
        $this->explanation_C6 = null;
        $this->explanation_C7 = null;
        $this->explanation_C8 = null;
        $this->explanation_C9 = null;
        $this->explanation_C10 = null;
        $this->explanation_D1 = null;
        $this->explanation_D2 = null;
        $this->explanation_D3 = null;
        $this->explanation_D4 = null;
        $this->explanation_D5 = null;
        $this->explanation_D6 = null;
        $this->explanation_E1 = null;
        $this->explanation_E2 = null;
        $this->explanation_E3 = null;
        $this->notes = null;
    }
}
