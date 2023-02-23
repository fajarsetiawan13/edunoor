<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;

class SchoolUpdate extends Component
{
    public $name, $npsn, $bp, $status, $kepsek, $akreditasi, $kurikulum, $schoolId;
    public  $status_kepemilikan, $sk_pendirian, $sk_pendirian_tanggal, $sk_ijin_operasional, $sk_ijin_operasional_tanggal;

    protected $listeners = [
        'getSchool' => 'showSchool'
    ];

    public function render()
    {
        return view('livewire.school-update');
    }

    public function showSchool($school)
    {
        $this->schoolId = $school['id'];
        $this->name = $school['name'];
        $this->npsn = $school['npsn'];
        $this->bp = $school['bp'];
        $this->status = $school['status'];
        $this->status_kepemilikan = $school['status_kepemilikan'];
        $this->sk_pendirian = $school['sk_pendirian'];
        $this->sk_pendirian_tanggal = $school['sk_pendirian_tanggal'];
        $this->sk_ijin_operasional = $school['sk_ijin_operasional'];
        $this->sk_ijin_operasional_tanggal = $school['sk_ijin_operasional_tanggal'];
        $this->kepsek = $school['kepsek'];
        $this->akreditasi = $school['akreditasi'];
        $this->kurikulum = $school['kurikulum'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'npsn' => 'required',
            'bp' => 'required',
            'status' => 'required',
            'status_kepemilikan' => 'required|min:3|max:255',
            'sk_pendirian' => 'nullable|min:3|max:255',
            'sk_pendirian_tanggal' => 'nullable|min:3|max:255',
            'sk_ijin_operasional' => 'nullable|min:3|max:255',
            'sk_ijin_operasional_tanggal' => 'nullable|min:3|max:255',
            'kepsek' => 'required',
            'akreditasi' => 'required',
            'kurikulum' => 'required',
        ]);

        if ($this->schoolId) {
            $school = School::find($this->schoolId);
            $school->update([
                'name' => $this->name,
                'npsn' => $this->npsn,
                'bp' => $this->bp,
                'status' => $this->status,
                'status_kepemilikan' => $this->status_kepemilikan,
                'sk_pendirian' => $this->sk_pendirian,
                'sk_pendirian_tanggal' => $this->sk_pendirian_tanggal,
                'sk_ijin_operasional' => $this->sk_ijin_operasional,
                'sk_ijin_operasional_tanggal' => $this->sk_ijin_operasional_tanggal,
                'kepsek' => $this->kepsek,
                'akreditasi' => $this->akreditasi,
                'kurikulum' => $this->kurikulum,
            ]);

            $this->resetInput();
            $this->emit('schoolUpdated', $school);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->npsn = null;
        $this->bp = null;
        $this->status = null;
        $this->status_kepemilikan = null;
        $this->sk_pendirian = null;
        $this->sk_pendirian_tanggal = null;
        $this->sk_ijin_operasional = null;
        $this->sk_ijin_operasional_tanggal = null;
        $this->kepsek = null;
        $this->akreditasi = null;
        $this->kurikulum = null;
    }
}
