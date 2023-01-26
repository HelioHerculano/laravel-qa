<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;
use App\Models\Question;
use GuzzleHttp\Psr7\Request;

class vote extends Component
{
   public $model;
   Public $label;

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
        return view('components.shared.vote');
    }
}
