<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\Students;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsIndex extends Component
{
    use WithPagination;
    public $paginate = 5;
    public $search;
    public $school_id;

    protected $listeners = [
        'studentStored' => 'handleStored',
        'studentUpdated' => 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->school_id = request()->segment(3);
    }

    public function render()
    {
        return view('livewire.students-index', [
            'students' =>  $this->search === null ?
                Students::where('school_id', $this->school_id)->paginate($this->paginate) :
                Students::where('school_id', $this->school_id)->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getStudent($id)
    {
        $student = Students::find($id);
        $this->emit('getStudent', $student);
    }

    public function getStudentCard($id)
    {
        $student = Students::find($id);
        $this->emit('getStudentCard', $student);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Students::find($id);
            $data->delete();
            session()->flash('success', 'Data Siswa berhasil dihapus.');
        }
    }

    public function handleStored($student)
    {
        session()->flash('success', $student['name'] . ' berhasil ditambahkan.');
    }

    public function handleUpdated($student)
    {
        session()->flash('success', 'Data ' . $student['name'] . ' berhasil diubah.');
    }
}
