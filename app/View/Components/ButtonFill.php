<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonFill extends Component
{
    public string $text;
    public string $url;
    public string $class;

    public function __construct(string $text, string $url, string $class)
    {
        $this->text = $text;
        $this->url = $url;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.button-fill');
    }
}
