<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }


    // public function destroyCategory()
    // {
    //     $category = Category::find($this->category_id);
    
    //     // Delete the category's image file (if it exists)
    //     $path = 'uploads/category/' . $category->image;
    //     if (File::exists($path)) {
    //         File::delete($path);
    //     }
    
    //     // Perform the soft-deletion
    //     $category->delete();
    
    //     session()->flash('message', 'Category deleted');
    //     $this->dispatchBrowserEvent('close-modal');
    // }
    

    public function render()
{
    $categories = Category::orderBy('name', 'ASC')->paginate(5);

    return view('livewire.admin.category.index', ['categories' => $categories]);
}


}
