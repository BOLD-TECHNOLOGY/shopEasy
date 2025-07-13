<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $size;
    public $centered;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $title, $size = 'modal-lg', $centered = true)
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        $this->centered = $centered ? 'modal-dialog-centered' : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
