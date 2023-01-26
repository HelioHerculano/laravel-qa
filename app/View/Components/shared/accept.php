<?php

namespace App\View\Components\shared;

use App\Models\Answer;
use Illuminate\View\Component;

class accept extends Component
{
    public $model;

    public function __construct(Answer $model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.accept');
    }
}
