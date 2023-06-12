<?php

namespace App\Http\Livewire;

use App\Models\Infrastructure;
use App\Models\Questionnaire;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionareIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;
    public $filter;

    protected $updatesQueryString = ['search'];

    protected $listeners = [
        'questionStored' => 'handleStored',
        'questionUpdated' => 'handleUpdated'
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        // dd(Infrastructure::with('school.qr')->get());
        return view('livewire.questionare-index', [
            'questionnaire' => $this->search === null ?
                Infrastructure::OrderBy('created_at')->OrWhere('school_bp', 'like', '%' . $this->filter)->paginate($this->paginate) :
                Infrastructure::OrderBy('created_at')->OrWhere('school_bp', 'like', '%' . $this->filter)->where('school_id', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getQuestion($id)
    {
        $question = Infrastructure::find($id);
        $this->emit('getQuestion', $question);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Infrastructure::find($id);
            $data->delete();
            session()->flash('success', 'Pertanyaan berhasil dihapus.');
        }
    }

    public function handleStored($question)
    {
        session()->flash('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function handleUpdated($question)
    {
        session()->flash('success', 'Pertanyaan berhasil diubah.');
    }
}
