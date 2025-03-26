<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Alumni extends Component
{
    public function render()
    {
        return view('livewire.frontend.alumni')->layout('livewire.frontend.layouts.app');
    }
}
