<?php

namespace App\View\Components\answers;

use Illuminate\View\Component;
use app\Models\Question;

class create extends Component
{
    public $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.answers.create');
    }
}
