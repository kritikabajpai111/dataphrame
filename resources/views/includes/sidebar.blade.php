<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(!empty(Auth::user()->profile_image))
             @php $user_profile ='storage/profile_image/'.Auth::user()->profile_image; @endphp 
          @else
             @php $user_profile ='img/default_profile.png'; @endphp 
          @endif

          <img src="{{ asset($user_profile ) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      sidebar menu: : style can be found in sidebar.less
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active" >
          <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>-->
          </a>         
        </li> 
         <li >
          <a href="{{ route('users.index') }}">
            @role('super_admin') <i class="fa fa-user"></i> <span> General Employee Portal @endrole</span>           
          </a>
        </li> 
		    <li>
          <a href="{{ route('roles.index') }}">
            @role('super_admin')<i class="fa fa-th"></i> <span> Manage Role @endrole</span>
          </a>
        </li>
        <li>
          <a href="{{ route('clients.index') }}">
            @role('super_admin')<i class="fa fa-th"></i> <span> Manage Client @endrole</span>
          </a>
        </li>      			
  </aside>