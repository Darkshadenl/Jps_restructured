<?php

namespace App\View\Components;

use App\Models\Offer;
use Illuminate\View\Component;

class above_fold extends Component
{

    public $offers;

    public function __construct($offers)
    {
        $this->offers = $offers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.above_fold');
    }
}
