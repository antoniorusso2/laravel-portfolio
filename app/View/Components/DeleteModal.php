<?php

namespace App\View\Components;

use App\Models\Project;
use App\Models\Type;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    public Type | Project $item;
    public string $route;

    /**
     * Create a new component instance.
     */
    public function __construct(Type | Project $item, string $route)
    {
        $this->item = $item;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal');
    }
}
