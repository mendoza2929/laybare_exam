<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $selectedCategory = $request->input('category', 'all');
    $selectedSort = $request->input('sort', 'asc');
    $searchKeyword = $request->input('search', '');

    // Retrieve all categories
    $categories = Category::all();

    // Retrieve products based on the selected category, search keyword, and sort order
    $products = Product::when($selectedCategory != 'all', function ($query) use ($selectedCategory) {
        $query->where('category_id', $selectedCategory);
    })
    ->when($searchKeyword, function ($query) use ($searchKeyword) {
        $query->where('name', 'like', '%' . $searchKeyword . '%')
              ->orWhere('description', 'like', '%' . $searchKeyword . '%');
    })
    ->orderBy('name', $selectedSort)
    ->orderBy('updated_at', 'desc')
    ->paginate(10);

    return view('admin.dashboard', compact('products', 'categories', 'selectedCategory', 'selectedSort', 'searchKeyword'));
}

    

}
