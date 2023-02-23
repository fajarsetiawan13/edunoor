<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\QRCodes;
use chillerlan\QRCode\QRCode;
use Livewire\Component;

class StudentsCard extends Component
{
    public $name, $nisn, $school, $school_id, $qr_image, $student_id;

    protected $listeners = [
        'getStudentCard' => 'showStudentCard'
    ];

    public function render()
    {
        return view('livewire.students-card');
    }

    public function showStudentCard($student)
    {
        $schools = School::all();
        $qr_codes = QRCodes::all();

        $this->student_id = $student['id'];
        $this->name = $student['name'];
        $this->nisn = $student['nisn'];
        foreach ($schools as $sch) {
            if ($sch->id == $student['school_id']) {
                $this->school = $sch->name;
            }
        }
        foreach ($qr_codes as $qr) {
            if ($qr->student_id == $student['id']) {
                $this->qr_image = $qr->qr_image;
            }
        }
    }
}
