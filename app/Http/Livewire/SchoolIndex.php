<?php

namespace App\Http\Livewire;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolIndex extends Component
{
    use WithPagination;
    public $paginate = 5;
    public $search;
    public $filter;

    protected $listeners = [
        'schoolStored' => 'handleStored',
        'schoolUpdated' => 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.school-index', [
            'schools' => $this->search === null ? 
            School::OrderBy('name')->OrWhere('bp', 'like', '%' . $this->filter)->paginate($this->paginate) : 
            School::OrderBy('name')->OrWhere('bp', 'like', '%' . $this->filter)->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getSchool($id)
    {
        $school = School::find($id);
        $this->emit('getSchool', $school);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = School::find($id);
            $data->delete();
            session()->flash('success', 'Data Sekolah berhasil dihapus.');
        }
    }

    public function handleStored($school)
    {
        session()->flash('success', $school['name'] . ' berhasil ditambahkan.');
    }

    public function handleUpdated($school)
    {
        session()->flash('success', 'Data ' . $school['name'] . ' berhasil diubah.');
    }
}
