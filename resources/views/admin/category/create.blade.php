@extends('layouts.admin')


@section('content')

<div class="pagetitle mb-4">
    <h1>Category</h1>
    <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
       </ol>

       <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <div class="card-header">
                <h4 class="fw-bold">Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-success float-end"><i class="bi bi-box-arrow-left"></i></a>
                </h4> 
            </div>

            <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
    
                    <div class="col-md-6 mb-3">
                        <label>Project Manager</label>
                        <input type="text" name="project_manager" class="form-control">
                    </div>
                 
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea row="3" name="description" class="form-control"></textarea>
                    </div>

                    @error('description') <small class="text-danger">{{$message}}</small> @enderror


                    <div class="col-md-6 mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-success float-end">Save</button>
                    </div>
                    
                </div>
             
            </form>
   

        </div>
    </div>


      
 </div>

@endsection