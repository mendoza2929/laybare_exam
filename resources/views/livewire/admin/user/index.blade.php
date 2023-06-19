
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"><i class="bi bi-clipboard-data"></i> Category Delete</div>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body"> 
                        <h6>Are you sure you want to delete this User?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success shadow-none">Yes</button>
                    </div>
                </form>
            </div>
    </div>
</div>



<div class="pagetitle mb-4">
    <h1>User Manager</h1>
    <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">User Manager</li>
       </ol>

       @if (session('message'))
       <div class="alert alert-success">{{session('message')}}</div>
      @endif

        
       <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="card-header">
                <h4 class="fw-bold">User Manger
                    <a href="{{url('admin/user/create')}}" class="btn btn-success float-end shadow-none"><i class="bi bi-plus shadow-none"></i> Add Category</a>
                </h4> 
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                        <tr>
                    
                            <td>
                                {{ $users->name }}
                            </td>
                            
                            <td>
                                {{ $users->fname }}
                            </td>
                            
                            <td>
                                {{ $users->mname }}
                            </td>
                            
                            <td>
                                {{ $users->lname }}
                            </td>
                            
                            <td>
                                {{ $users->email }}
                            </td>
                         
                            <td>
                                <a href="{{url('admin/user/'.$users->id.'/edit')}}" class="btn-sm shadow-none btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{url('admin/user/'.$users->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this user?')" class="btn btn-sm btn-danger">
                          
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $user->links() }}
            </div>
         </div>
       </div>
 </div>