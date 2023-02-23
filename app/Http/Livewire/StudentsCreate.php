<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\Students;
use Livewire\Component;

class StudentsCreate extends Component
{
    public $name, $nisn, $school_id;

    public function render()
    {
        return view('livewire.students-create', ['schools' => School::all()]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'nisn' => 'required',
            'school_id' => 'required'
        ]);

        $student = Students::create([
            'name' => $this->name,
            'nisn' => $this->nisn,
            'school_id' => $this->school_id
        ]);
        $this->emit('studentStored', $student);
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->nisn = null;
        $this->school_id = null;
    }
}
