<?php

namespace App\View\Components;

use Illuminate\View\Component;

class messages extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $user = '';
     public $messages = [];

    public function __construct($messages, $user)
    {
        $this->user = $user;
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.messages');
    }
}
