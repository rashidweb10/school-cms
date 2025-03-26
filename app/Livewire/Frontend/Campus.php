<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Campus extends Component
{
    public function render()
    {
        return view('livewire.frontend.campus')->layout('livewire.frontend.layouts.app');
    }
}
