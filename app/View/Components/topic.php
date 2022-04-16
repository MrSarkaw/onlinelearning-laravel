<?php

namespace App\View\Components;

use Illuminate\View\Component;

class topic extends Component
{
    
    public $rooms = 0;
    public $topics = [];
    
    public function __construct($rooms, $topics)
    {   
        $this->rooms = $rooms;
        $this->topics = $topics;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topic');
    }
}
