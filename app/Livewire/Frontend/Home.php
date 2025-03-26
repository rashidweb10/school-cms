<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Page;

class Home extends Component
{
    public function render()
    {
        $page = Page::where('slug', 'home')->first();
        return view('livewire.frontend.home')->with([
            'pageData' => $page
        ])->layout('livewire.frontend.layouts.app', [
            'meta' => [
                'title' => $page->seo_title ?? 'Default Title',
                'description' => $page->seo_description ?? 'Default Description',
            ]
        ]);
    }
}
