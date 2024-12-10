<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Movie model
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category_id');
    
        $movies = Product::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->when($categoryId, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->with('category')
            ->paginate(10); // Add pagination
    
        return view('front.includes.search', compact('movies', 'query', 'categoryId'));
    }

}
