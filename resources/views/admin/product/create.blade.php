@extends('layouts.admin')


@section('content')

<div class="pagetitle mb-4">
    <h1>Products</h1>
    <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
       </ol>

       <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
        @endif

            <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-toggle="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Category</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="mb-3">

                          
                    <div class="mb-3">
                        <label for="">Product SKU</label>
                        <input type="text" name="sku" class="form-control">
                    </div>

                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories->sortBy('name') as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Product Image</label>
                        <input type="file" multiple name="image[]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Submit</button>
         </form>
        </div>
      
    </div>


      
 </div>

@endsection