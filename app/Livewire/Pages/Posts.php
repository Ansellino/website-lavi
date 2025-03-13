<?php
// filepath: app/Livewire/Pages/Posts.php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('livewire.layouts.app')]
#[Title('Our Products')]
class Posts extends Component
{
    use WithPagination;

    // Filter Properties
    public $search = '';
    public $min_price = '';
    public $max_price = '';
    public $sort = '';

    // UI State
    public $showFilters = false;

    // Querystring parameters
    protected $queryString = [
        'search' => ['except' => ''],
        'min_price' => ['except' => ''],
        'max_price' => ['except' => ''],
        'sort' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    // Reset pagination when filters change
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedSort()
    {
        $this->resetPage();
    }

    // Toggle filter visibility
    public function toggleFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    // Reset all filters
    public function resetFilters()
    {
        $this->reset(['search', 'min_price', 'max_price', 'sort']);
        $this->resetPage();
    }

    // Toggle favorite status for a post
    public function toggleFavorite($postId)
    {
        if (!Auth::check()) {
            // Redirect to login if user is not authenticated
            return $this->redirect(route('login'), navigate: true);
        }

        $post = Post::find($postId);

        if (!$post) {
            return;
        }

        $user = Auth::user();

        // Check if the user has already favorited this post
        if ($post->favoritedBy()->where('user_id', $user->id)->exists()) {
            // Unfavorite
            $post->favoritedBy()->detach($user->id);
            $isFavorited = false;
        } else {
            // Favorite
            $post->favoritedBy()->attach($user->id);
            $isFavorited = true;
        }

        // Get updated count
        $count = $post->favoritedBy()->count();

        // Return data to be used by the view
        $this->dispatch('favorite-updated', [
            'postId' => $postId,
            'isFavorited' => $isFavorited,
            'count' => $count
        ]);
    }

    public function render()
    {
        $query = Post::withCount('favoritedBy');

        // Search filter
        if ($this->search) {
            $searchTerm = strip_tags($this->search);
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Price Range filters
        if ($this->min_price !== '') {
            $minPrice = max(0, (float) $this->min_price);
            $query->where('price', '>=', $minPrice);
        }

        if ($this->max_price !== '') {
            $maxPrice = max(0, (float) $this->max_price);
            $query->where('price', '<=', $maxPrice);
        }

        // Sorting
        if ($this->sort) {
            match($this->sort) {
                'price_asc' => $query->orderBy('price', 'asc'),
                'price_desc' => $query->orderBy('price', 'desc'),
                'latest' => $query->latest(),
                default => $query->latest()
            };
        } else {
            $query->latest();
        }

        $posts = $query->paginate(12);

        return view('livewire.pages.posts', [
            'posts' => $posts
        ]);
    }
}
