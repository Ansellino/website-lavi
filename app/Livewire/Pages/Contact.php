<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('livewire.layouts.app')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.contact');
    }
}