<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;

class SchoolCreate extends Component
{
    public $name, $npsn, $bp, $status, $kepsek, $akreditasi, $kurikulum;
    public  $status_kepemilikan, $sk_pendirian, $sk_pendirian_tanggal, $sk_ijin_operasional, $sk_ijin_operasional_tanggal;

    public function render()
    {
        return view('livewire.school-create');
    }

    public function store()
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

        $school = School::create([
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
        $this->emit('schoolStored', $school);
        $this->resetInput();
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
