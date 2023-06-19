@extends('layouts.admin')


@section('content')

<div class="pagetitle mb-4">
    <h1>Create User</h1>
    <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">User Manager</li>
       </ol>

       <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <div class="card-header">
                <h4 class="fw-bold">Create User
                    <a href="{{url('admin/user')}}" class="btn btn-success float-end"><i class="bi bi-box-arrow-left"></i></a>
                </h4> 
            </div>

            <form action="{{url('admin/user')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Username</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    @error('name') <small class="text-danger">{{$message}}</small> @enderror

                    <div class="col-md-6 mb-3">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>

                    
                    @error('fname') <small class="text-danger">{{$message}}</small> @enderror


                    <div class="col-md-6 mb-3">
                        <label>Middle Name</label>
                        <input type="text" name="mname" class="form-control">
                    </div>

                    
                    @error('mname') <small class="text-danger">{{$message}}</small> @enderror


                    <div class="col-md-6 mb-3">
                        <label>last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>

                    
                    @error('lname') <small class="text-danger">{{$message}}</small> @enderror


                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror


                    <div class="col-md-6 mb-3">
                        <label>password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    
                    @error('password') <small class="text-danger">{{$message}}</small> @enderror




    
                    
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-success float-end">Save</button>
                    </div>
                    
                </div>
             
            </form>
   

        </div>
    </div>


      
 </div>

@endsection