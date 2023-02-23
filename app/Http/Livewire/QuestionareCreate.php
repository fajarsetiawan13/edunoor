<?php

namespace App\Http\Livewire;

use App\Models\Questionnaire;
use Livewire\Component;

class QuestionareCreate extends Component
{
    public $question;

    public function render()
    {
        return view('livewire.questionare-create');
    }

    public function store()
    {
        $this->validate(['question' => 'required|min:3|max:255']);
        $question = Questionnaire::create(['question' => $this->question]);
        $this->emit('questionStored', $question);
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->question = null;
    }
}
