<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $isOpen = false;
    public $imageSrc = '';
    public $description = '';

    protected $listeners = ['openModal'];

    public function openModal($imageSrc, $description)
    {
        $this->imageSrc = $imageSrc;
        $this->description = $description;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
