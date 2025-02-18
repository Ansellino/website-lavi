<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Post::withCount('favoritedBy');

            // Search with validation
            if ($request->filled('search')) {
                $searchTerm = strip_tags($request->search);
                $query->where('title', 'like', '%' . $searchTerm . '%');
            }

            // Price Range with validation
            if ($request->filled('min_price')) {
                $minPrice = max(0, (float) $request->min_price);
                $query->where('price', '>=', $minPrice);
            }

            if ($request->filled('max_price')) {
                $maxPrice = max(0, (float) $request->max_price);
                $query->where('price', '<=', $maxPrice);
            }

            // Sorting with validation
            $query->when($request->filled('sort'), function($query) use ($request) {
                $sort = $request->sort;
                return match($sort) {
                    'price_asc' => $query->orderBy('price', 'asc'),
                    'price_desc' => $query->orderBy('price', 'desc'),
                    'latest' => $query->latest(),
                    default => $query->latest() // Default sorting
                };
            });
            
            $posts = Post::withCount('favoritedBy')
                ->latest()
                ->paginate(12);

            // Use proper pagination with query string
            $posts = $query->paginate(9)->appends($request->query());

            return view('posts.index', compact('posts'));

        } catch (QueryException $e) {
            return back()
                ->withErrors(['error' => 'An error occurred while fetching the products.'])
                ->withInput();
        }
    }

    public function show(Post $post)
    {
        try {
            return view('posts.show', compact('post'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Product not found.']);
        }
    }

    public function toggleFavorite(Post $post)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }

            if ($post->isFavoritedBy($user)) {
                $post->unfavorite($user);
                $isFavorited = false;
            } else {
                $post->favorite($user);
                $isFavorited = true;
            }

            return response()->json([
                'success' => true,
                'isFavorited' => $isFavorited,
                'count' => $post->favoritedBy()->count()
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to toggle favorite'], 500);
        }
    }
}
