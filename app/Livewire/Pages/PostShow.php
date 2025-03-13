<?php
// filepath: app/Livewire/Pages/PostShow.php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('livewire.layouts.app')]
#[Title('Post Details')]
class PostShow extends Component
{
    public Post $post;
    public bool $isFavorited = false;
    public int $favoritesCount = 0;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->checkIfFavorited();
        $this->favoritesCount = $post->favoritedBy()->count();
    }

    public function checkIfFavorited()
    {
        if (Auth::check()) {
            $this->isFavorited = $this->post->isFavoritedBy(Auth::user());
        }
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($this->post->isFavoritedBy($user)) {
            $this->post->unfavorite($user);
            $this->isFavorited = false;
        } else {
            $this->post->favorite($user);
            $this->isFavorited = true;
        }

        $this->favoritesCount = $this->post->favoritedBy()->count();
    }

    public function render()
    {
        return view('livewire.pages.post-show');
    }
}
