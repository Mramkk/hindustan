<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Img extends Component
{
    public $src, $id, $name, $btnid;
    /**
     * Create a new component instance.
     */
    public function __construct($src, $id, $name, $btnid)
    {
        $this->src = $src;
        $this->id = $id;
        $this->name = $name;
        $this->btnid = $btnid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.img');
    }
}
