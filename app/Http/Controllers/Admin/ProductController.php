<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    //create a new product
    public function create(){

        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }


    //database of the products
    public function productstore(ProductFormRequest $request)
{
    $validatedData = $request->validated();

    $category = Category::findOrFail($validatedData['category_id']);

    $uniqueId = uniqid(); // Generate a unique ID
    $sku = 'SKU-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3); // Generate a random SKU

    $product = $category->product()->create([
        'category_id' => $validatedData['category_id'],
        'unique_id' => $uniqueId,
        'sku' => $sku,
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
    ]);

    if ($request->hasFile('image')) {
        $uploadPath = 'uploads/product/';

        $i = 1;
        foreach ($request->file('image') as $imageFile) {
            $extension = $imageFile->getClientOriginalExtension();
            $filename = time() . $i++ . '.' . $extension;
            $imageFile->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . $filename;

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $finalImagePathName,
            ]);
        }
    }

    return redirect('/admin/product')->with('message', 'Product created successfully');
}

    //edit product

    public function edit(int $product_id){

        $categories = Category::all();
        $product= Product::findOrFail($product_id);
        return view('admin.product.edit',compact('categories','product'));
    }

    //update product
    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $product = Product::findOrFail($product_id);
    
        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'sku' => $validatedData['sku'],
                'description' => $validatedData['description'],
            ]);
    
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/product/';
    
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
    
            return redirect('/admin/product')->with('message', 'Product updated successfully');
        } else {
            return redirect('admin/product')->with('message', 'No such product ID found');
        }
    }

        //delete image
    public function destroyImage(int $product_image_id){
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image); //
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Image Deleted successfully');
    }

    //deleta product data

    public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        if($product->ProductImage){
            foreach($product->ProductImage as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted successfully');
    }

    
    

    
}
