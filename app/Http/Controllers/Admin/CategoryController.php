<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    //create a new category

    public function create(){
        return view('admin.category.create');
    }

    //store the data in the category

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
    
        // Check if category name already exists
        $existingCategory = Category::where('name', $validatedData['name'])->first();
        if ($existingCategory) {
            return redirect('admin/category')->with('message', 'Category name already exists');
        }
    
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->project_manager = $validatedData['project_manager'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
    
        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }
    


    // edit category

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }
    
    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();
    
        $category = Category::findOrFail($category);
    
        $category->name = $validatedData['name'];
        $category->project_manager = $validatedData['project_manager'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
    
        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }

    public function destroy(int $category_id){
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted successfully');
    }
    
    
}
