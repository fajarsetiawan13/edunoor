<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\Students;
use Livewire\Component;

class StudentsUpdate extends Component
{
    public $name, $nisn, $school_id, $student_id;

    protected $listeners = [
        'getStudent' => 'showStudent'
    ];

    public function render()
    {
        return view('livewire.students-update', ['schools' => School::all()]);
    }

    public function showStudent($student)
    {
        $this->student_id = $student['id'];
        $this->name = $student['name'];
        $this->nisn = $student['nisn'];
        $this->school_id = $student['school_id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'nisn' => 'required',
            'school_id' => 'required'
        ]);

        if ($this->student_id) {
            $student = Students::find($this->student_id);
            $student->update([
                'name' => $this->name,
                'nisn' => $this->nisn,
                'school_id' => $this->school_id,
            ]);

            $this->resetInput();
            $this->emit('userUpdated', $student);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->nisn = null;
        $this->school_id = null;
    }
}
