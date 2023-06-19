@extends('layouts.admin')


@section('content')


<div class="pagetitle mb-4">
    <h1>Products</h1>
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
            <h4 class="fw-bold">Products
                <a href="{{url('admin/product/create')}}" class="btn btn-success float-end"><i class="bi bi-plus shadow-none"></i> Add Products</a>
            </h4> 
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Category</th>
                        <th>Product SKU</th>
                        <th>Product Name </th>
                        <th>Product Image </th>
                        <th>Description</th>
                        <th>Action</th>
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
                        <td>
                            <a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn-sm shadow-none btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{url('admin/product/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this product?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Products Available</td>
                    </tr>
                    @endforelse
                </tbody>
                
                
            </table>
        </div>

    </div>
 </div>           

@endsection