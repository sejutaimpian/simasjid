<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title = null)
    {
        $this->title = $title ?? 'Dashboard - Masjid Baiturrahim';
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.dashboard');
    }
}
