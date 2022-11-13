<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SubmitButton extends Component
{
    public $value;
    public function __construct($value)
    {
        $this->value = $value;
    }
    public function render()
    {
        return view('components.forms.submit-button');
    }
}
