@extends('layouts.admin')


@section('content')


<div class="pagetitle mb-4">
    <h1>Dashboard</h1>
    <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
       </ol>

       
 </div>

 <div class="card border-0 shadow-sm mb-4">
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-body">



        <div class="card-header">
            <h4 class="fw-bold">All Products
              
            </h4> 
        </div>


        <div class="card-body">

            <div class="mb-3">
                <label for="category-filter">Category Filter:</label>
                <select name="category" id="category-filter" class="form-control" onchange="this.form.submit()">
                    <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>Show All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <!-- New search filter input field -->
                <input type="text" name="search" value="{{ $searchKeyword }}" placeholder="Search Products">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
            

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Category</th>
                        <th>Product SKU</th>
                        <th>Product Name </th>
                        <th>Product Image </th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->category)
                                {{ $product->category->name }}
                            @else
                                No Category
                            @endif
                        </td>
                        <td class="fw-bold">
                            {{ $product->sku }}
                        </td>
                        <td class="fw-bold">
                            {{ $product->name }}
                        </td>
                        <td>
                            <div>
                                @if ($product->productImages)
                                    @foreach ($product->productImages as $image)
                                    <img src="{{asset($image->image)}}" alt="" style="width: 80px; height:80px;" class="me-4">
                                    @endforeach
                                @else
                                <h5>No Image Available</h5>
                                @endif
                            </div>
                        </td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Products Available</td>
                    </tr>
                    @endforelse
                </tbody>
                
                
            </table>

             {{ $products->links() }}
        </div>

    </div>
 </div>           

@endsection