<?php

namespace App\Http\Livewire;

use App\Models\Questionnaire;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionareIndex extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;

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
        return view('livewire.questionare-index', [
            'question' => $this->search === null ?
                Questionnaire::paginate($this->paginate) :
                Questionnaire::where('question', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function getQuestion($id)
    {
        $question = Questionnaire::find($id);
        $this->emit('getQuestion', $question);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Questionnaire::find($id);
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
