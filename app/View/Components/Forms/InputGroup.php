<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $head;
    public $name;
    public $type;
    public function __construct($head, $name, $type)
    {
        $this->head = $head;
        $this->name = $name;
        $this->type = $type;
    }


    public function render()
    {
        return view('components.forms.input-group');
    }
}
