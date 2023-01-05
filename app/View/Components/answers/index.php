<?php

namespace App\View\Components\answers;

use Illuminate\View\Component;
use App\Models\Question;
use App\Models\Answer;

class index extends Component
{
    public $question;
    //public $answer;

    public function __construct(Question $question,Answer $answer)
    {
        $this->question = $question;
       // $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.answers.index');
    }
}
