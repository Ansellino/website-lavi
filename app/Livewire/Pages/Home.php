<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('livewire.layouts.app')]
#[Title('Lavioxel Shop - Premium Skincare Products')]
class Home extends Component
{
    // For product slideshow
    public int $totalImages = 8;
    public array $positions = [0, 1, 2, 3];
    public bool $autoRotate = true;

    public function mount()
    {
        // Initialize component state if needed
    }

    public function rotateRight()
    {
        $this->positions = array_map(function($pos) {
            return ($pos + 1) % $this->totalImages;
        }, $this->positions);
    }

    public function rotateLeft()
    {
        $this->positions = array_map(function($pos) {
            return ($pos - 1 + $this->totalImages) % $this->totalImages;
        }, $this->positions);
    }

    public function preloadResources()
    {
        $this->dispatch('add-preload-header', [
            'url' => asset('images1/banner.webp'),
            'as' => 'image'
        ]);

        // Preload first 4 product images
        for ($i = 1; $i <= 4; $i++) {
            $this->dispatch('add-preload-header', [
                'url' => asset("images1/{$i}.webp"),
                'as' => 'image'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
