<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin section</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if(Request::segment(1) == 'users') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>User Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">List</a>
                <a class="collapse-item" href="{{ route('users.create') }}">Add New</a>
                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- @hasrole('Admin') --}}
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Section
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
              aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-folder"></i>
              <span>Role&Permission</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Role & Permissions</h6>
                  <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                  <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
              </div>
          </div>
      </li>
      
      @can('client-list')
        <li class="nav-item  @if(Request::segment(1) == 'show-client'|| Request::segment(1) == 'create-client') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDownn"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Client Management</span>
        </a>
          
          <div id="taTpDropDownn" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Client Management:</h6>
                  
                  <a class="collapse-item" href="{{route('admin.client.index')}}">List</a>
                  
                  <a class="collapse-item" href="{{route('admin.client.create')}}">Add New</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('team-list')
        <li class="nav-item @if(Request::segment(1) == 'teams') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDownnn"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Team Management</span>
        </a>
          
          <div id="taTpDropDownnn" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Team Management:</h6>
                  <a class="collapse-item" href="{{route('teams.index')}}">List</a>
                  <a class="collapse-item" href="{{route('teams.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('team_title.index')}}">Team Title</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('service-list')
        <li class="nav-item @if(Request::segment(1) == 'service') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown1"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Service Management</span>
        </a>
          
          <div id="taTpDropDown1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Service Management:</h6>
                  <a class="collapse-item" href="{{route('service.index')}}">List</a>
                  <a class="collapse-item" href="{{route('service.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('service_title.index')}}">Service Title</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('category-list')
        <li class="nav-item @if(Request::segment(1) == 'category') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown2"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Category Management</span>
        </a>
          
          <div id="taTpDropDown2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Category Management:</h6>
                  <a class="collapse-item" href="{{route('category.index')}}">List</a>
                  <a class="collapse-item" href="{{route('category.create')}}">Add New</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('product-list')
        <li class="nav-item @if(Request::segment(1) == 'product') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown3"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Product Management</span>
        </a>
          
          <div id="taTpDropDown3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Product Management:</h6>
                  <a class="collapse-item" href="{{route('product.index')}}">List</a>
                  <a class="collapse-item" href="{{route('product.create')}}">Add New</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('questions-list')
        <li class="nav-item @if(Request::segment(1) == 'question') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown4"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Questions Management</span>
        </a>
          
          <div id="taTpDropDown4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Questions Management:</h6>
                  <a class="collapse-item" href="{{route('question.index')}}">List</a>
                  <a class="collapse-item" href="{{route('question.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('question_title.index')}}">Question Title</a>

                  
              </div>
          </div>
      </li>
      @endcan
      @can('skills-list')
        <li class="nav-item @if(Request::segment(1) == 'skill') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown5"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Skills Management</span>
        </a>
          
          <div id="taTpDropDown5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Skills Management:</h6>
                  <a class="collapse-item" href="{{route('skill.index')}}">List</a>
                  <a class="collapse-item" href="{{route('skill.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('skill_title.index')}}">Skill Title</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('why_us-list')
        <li class="nav-item @if(Request::segment(1) == 'why') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown6"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Why Us Management</span>
        </a>
          
          <div id="taTpDropDown6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Why Us Management:</h6>
                  <a class="collapse-item" href="{{route('why.index')}}">List</a>
                  <a class="collapse-item" href="{{route('why.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('why_title.index')}}">Why Us Title</a>
                  
              </div>
          </div>
      </li>
      @endcan
      @can('plans-list')
        <li class="nav-item @if(Request::segment(1) == 'plan') active @endif">
          <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#taTpDropDown7"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Plans Management</span>
        </a>
          
          <div id="taTpDropDown7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Plans Management:</h6>
                  <a class="collapse-item" href="{{route('plan.index')}}">List</a>
                  <a class="collapse-item" href="{{route('plan.create')}}">Add New</a>
                  <a class="collapse-item" href="{{route('advantage.index')}}">Advantage List</a>
                  <a class="collapse-item" href="{{route('advantage.create')}}">Add Advantage</a>
                  {{-- <a class="collapse-item" href="{{route('plan.index')}}">Why Us Title</a> --}}
                  
              </div>
          </div>
      </li>
      @endcan
        
        
        
      <li class="nav-item @if(Request::segment(1) == 'head_title') active @endif">
          <a class="nav-link " href="{{route('head_title.index')}}">
              <i class=""></i>
              <span>Header Title</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'cta_title') active @endif">
          <a class="nav-link" href="{{route('cta_title.index')}}">
              <i class=""></i>
              <span>Call To Action Title</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'portfolio_title') active @endif">
          <a class="nav-link" href="{{route('portfolio_title.index')}}">
              <i class=""></i>
              <span>Portfolio Title</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'pricing_title') active @endif">
          <a class="nav-link" href="{{route('pricing_title.index')}}">
              <i class=""></i>
              <span>Pricing Title</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'about') active @endif">
          <a class="nav-link" href="{{route('about.index')}}">
              <i class=""></i>
              <span>About</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'show-message') active @endif">
          <a class="nav-link" href="{{route('admin.message.show')}}">
              <i class=""></i>
              <span>Messages</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'show-news') active @endif">
          <a class="nav-link" href="{{route('admin.news.show')}}">
              <i class=""></i>
              <span>News Emails</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'social') active @endif">
          <a class="nav-link" href="{{route('social.index')}}">
              <i class=""></i>
              <span>Social Info</span></a>
      </li>
      <li class="nav-item @if(Request::segment(1) == 'info') active @endif">
          <a class="nav-link" href="{{route('info.index')}}">
              <i class=""></i>
              <span>Info Management</span></a>
      </li>
      
      

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    {{-- @endhasrole --}}

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}


</ul>