<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Movie model
use App\Models\Category;

class ProductController extends Controller
{
    public function moviesByCategory($id)
    {
        $category = Category::findOrFail($id); // Get the category
        $movies = Product::where('category_id', $id)->paginate(20); // Fetch movies with pagination
        return view('front.includes.movies', compact('movies', 'category'));
    }

    public function show($id)
    {
        $movie = Product::with(['category', 'relatedMovies'])->findOrFail($id); // Adjust relationships as needed
        return view('front.includes.singleMovie', compact('movie'));
    }

}
