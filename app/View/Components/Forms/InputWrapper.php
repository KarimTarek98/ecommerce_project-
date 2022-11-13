<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputWrapper extends Component
{
    public $inputName;
    public function __construct($inputName)
    {
        $this->inputName = $inputName;
    }


    public function render()
    {
        return view('components.forms.input-wrapper');
    }
}
