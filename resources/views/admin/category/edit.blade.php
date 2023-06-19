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
                <h4 class="fw-bold">Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-success float-end"><i class="bi bi-box-arrow-left"></i></a>
                </h4> 
            </div>

            <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value='{{$category->name}}' class="form-control">
                    </div>

                   
    
                    <div class="col-md-6 mb-3">
                        <label>Project Manager</label>
                        <input type="text" name="slug" value='{{$category->project_manager}}' class="form-control">
                    </div>
                 
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea row="3" name="description" class="form-control">{{$category->description}}</textarea>
                    </div>

               


                    <div class="col-md-6 mb-3">
                        <label>Status</label><br>
                        <input type="checkbox" name="status" {{$category->status == '1'? 'checked':''}}>
                    </div>
    

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-success float-end">Update</button>
                    </div>
                    
                </div>
             
            </form>
   

        </div>
    </div>


      
 </div>

@endsection