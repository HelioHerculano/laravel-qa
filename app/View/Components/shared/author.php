<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;

class author extends Component
{
    public $model;
    public $label;

    public function __construct($model,$label)
    {
        $this->model = $model;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.author');
    }
}
