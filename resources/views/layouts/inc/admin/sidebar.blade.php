<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item"> <a class="nav-link " href="{{url('admin/dashboard')}}"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
       <li class="nav-item">
      
<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
<i class="bi bi-menu-button-wide"></i>
<span>Category</span>
<i class="bi bi-chevron-down ms-auto"></i>
</a>
<li class="nav-item">
 <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
             <li> <a href="{{url('admin/category/create')}}"> <i class="bi bi-circle"></i><span>Add Category </span> </a></li>
             <li> <a href="{{url('admin/category')}}"> <i class="bi bi-circle"></i><span>View Category</span> </a></li>
    
 </ul>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
  <i class="bi bi-menu-button-wide"></i>
  <span>Add Product</span>
  <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <li class="nav-item">
   <ul id="product-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
               <li> <a href="{{url('admin/product/create')}}"> <i class="bi bi-circle"></i><span> Add Product </span> </a></li>
               <li> <a href="{{url('admin/product')}}"> <i class="bi bi-circle"></i><span>View Product</span> </a></li>
      
   </ul>
  </li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
  <i class="bi bi-menu-button-wide"></i>
  <span>User Manager</span>
  <i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <li class="nav-item">
   <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
               <li> <a href="{{url('admin/user/create')}}"> <i class="bi bi-circle"></i><span>Add User Manager </span> </a></li>
               <li> <a href="{{url('admin/user')}}"> <i class="bi bi-circle"></i><span>View User Manager</span> </a></li>
      
   </ul>
  </li>
  


 </aside>