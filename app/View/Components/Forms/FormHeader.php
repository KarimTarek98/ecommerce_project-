<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class FormHeader extends Component
{
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        return view('components.forms.form-header');
    }
}
