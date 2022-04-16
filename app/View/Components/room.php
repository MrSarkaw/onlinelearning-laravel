<?php

namespace App\View\Components;

use Illuminate\View\Component;

class room extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $rooms = [];
    public function __construct($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.room');
    }
}
