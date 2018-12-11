<div class="card">
  <div class="card-header bg-dark text-white">
    Navigation
  </div>
  <div class="card-body">
    
    
    User: {{Auth::user()->getName()}}
    <br>
    @if(Auth::user()->is_admin)
    Log Type: Administrator
    @else
    Log Type: Encoder
    @endif
    <br>
    @if(Auth::user()->root)
    Root Access
   @endif
   
  </div>
<ul class="list-group">
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
  	<a href="/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href="/farmers"><i class="fa fa-users"></i> Farmers</a>
  </li>
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
  	<a href="/machines"><i class="fa fa-cogs"></i> Machines/Equipment</a>
  </li>
  @if(Auth::user()->is_admin)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a data-toggle="collapse" href="#users"><i class="fa fa-user-cog"></i> User Management</a>
  </li>
      <div id="users" class="collapse">
      <ul class="list-group">
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/users/create"><i class="fa fa-user-plus"></i> Create User</a</li>
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/users"><i class="fa fa-user-friends"></i> Users</a></li>
        @if(Auth::user()->root)
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/users/admin"><i class="fa fa-user-lock"></i> Admins</a></li>
        @endif
      </ul>
    </div>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a data-toggle="collapse" href="#agri"><i class="fa fa-leaf"></i> Farm Entities</a>
  </li>
    <div id="agri" class="collapse">
      <ul class="list-group">
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/animals"><i class="fa fa-paw"></i> Livestock/Poultry</a></li>
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/trees"><i class="fa fa-tree"></i> Trees</a></li>
        <li class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/crops"><i class="fa fa-cannabis"></i> Crops</a></li>
      </ul>
    </div>
  @endif  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a  href="/reports"><i class="fa fa-chart-bar"></i> Reports</a>
  </li>
</ul>
</div>