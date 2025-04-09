<?php

namespace App\View\Components;

use App\Models\Technology;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TechnologyCard extends Component
{

    public Technology $technology;

    /**
     * Create a new component instance.
     */
    public function __construct(Technology $technology)
    {
        $this->technology = $technology;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.technology-card');
    }
}
