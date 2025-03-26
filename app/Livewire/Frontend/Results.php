<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Results extends Component
{
    public function render()
    {
        return view('livewire.frontend.results')->layout('livewire.frontend.layouts.app');
    }
}
