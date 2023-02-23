<?php

namespace App\Http\Livewire;

use App\Models\Questionnaire;
use Livewire\Component;

class QuestionareUpdate extends Component
{
    public $question, $question_id;

    protected $listeners = [
        'getQuestion' => 'showQuestion'
    ];

    public function render()
    {
        return view('livewire.questionare-update');
    }

    public function showQuestion($question)
    {
        $this->question = $question['question'];
        $this->question_id = $question['id'];
    }

    public function update()
    {
        $this->validate(['question' => 'required|min:3|max:255']);
        if ($this->question_id) {
            $question = Questionnaire::find($this->question_id);
            $question->update(['question' => $this->question]);
        }
        $this->emit('questionStored', $question);
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->question = null;
    }
}
