<?php

namespace App\View\Components;

use App\Models\Human;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectHuman extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $inputName,
        public string|null $value,
        public string|null $name,
        public string|null $lastname,
        public string|null $surname,
        public mixed $human = null,
        public mixed $humans = null,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-human');
    }
}
