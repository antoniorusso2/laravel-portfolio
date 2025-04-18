<?php

namespace App\View\Components;

use App\Models\Type;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeCard extends Component
{
    public Type $type;
    /**
     * Create a new component instance.
     */
    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.type-card');
    }
}
