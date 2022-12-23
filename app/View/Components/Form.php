<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Question;

class Form extends Component
{

     public $buttonText;
     
     public $question;

    public function __construct($buttonText,Question $question)
    {
        $this->buttonText = $buttonText;
        $this->question = $question;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
