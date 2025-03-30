<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Page;

class Home extends Component
{
    public function render()
    {
        $page = Page::where('company_id', config('custom.school_id'))->where('slug', 'home')->where('is_active', '1')->first();
        return view('livewire.frontend.home')->with([
            'pageData' => $page
        ])->layout('livewire.frontend.layouts.app', [
            'meta' => [
                'title' => $page->seo_title ?? '',
                'description' => $page->seo_description ?? '',
            ]
        ]);
    }
}
