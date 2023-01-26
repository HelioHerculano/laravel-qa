<?php

namespace App\View\Components\shared;

use App\Models\Question;
use Illuminate\View\Component;

class favorite extends Component
{
    public $model;

    public function __construct(Question $model)
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
        return view('components.shared.favorite');
    }
}
