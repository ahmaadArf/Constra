<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-business-time"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashborad</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclinet"
            aria-expanded="true" aria-controls="collapseclinet">
            <i class="fas fa-users-cog"></i>
            <span>Clients</span>
        </a>
        <div id="collapseclinet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.clients.index') }}">All Clinet</a>
                <a class="collapse-item" href="{{ route('admin.clients.create') }}">Add Clinet</a>
                <a class="collapse-item" href="{{ route('admin.clients.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefacts"
            aria-expanded="true" aria-controls="collapsefacts">
            <i class="fas fa-users-cog"></i>
            <span>Facts</span>
        </a>
        <div id="collapsefacts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.facts.index') }}">All Fact</a>
                <a class="collapse-item" href="{{ route('admin.facts.create') }}">Add Fact</a>
                <a class="collapse-item" href="{{ route('admin.facts.trash') }}">Trash</a>
            </div>
        </div>
    </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsimages"
                aria-expanded="true" aria-controls="collapsimages">
                <i class="fas fa-users-cog"></i>
                <span>Images</span>
            </a>
            <div id="collapsimages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.images.index') }}">All Image</a>
                    <a class="collapse-item" href="{{ route('admin.images.create') }}">Add Image</a>
                </div>
            </div>
        </li>
         <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemenu"
            aria-expanded="true" aria-controls="collapsemenu">
            <i class="fas fa-users-cog"></i>
            <span>Menu</span>
        </a>
        <div id="collapsemenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.menus.index') }}">All Menu</a>
                <a class="collapse-item" href="{{ route('admin.menus.create') }}">Add Menu</a>
                <a class="collapse-item" href="{{ route('admin.menus.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepost"
            aria-expanded="true" aria-controls="collapsepost">
            <i class="fas fa-users-cog"></i>
            <span>Post</span>
        </a>
        <div id="collapsepost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.posts.index') }}">All Post</a>
                <a class="collapse-item" href="{{ route('admin.posts.create') }}">Add Post</a>
                <a class="collapse-item" href="{{ route('admin.posts.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseprice"
            aria-expanded="true" aria-controls="collapseprice">
            <i class="fas fa-users-cog"></i>
            <span>Price</span>
        </a>
        <div id="collapseprice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.prices.index') }}">All Price</a>
                <a class="collapse-item" href="{{ route('admin.prices.create') }}">Add Price</a>
                <a class="collapse-item" href="{{ route('admin.prices.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproject"
            aria-expanded="true" aria-controls="collapseproject">
            <i class="fas fa-users-cog"></i>
            <span>Project</span>
        </a>
        <div id="collapseproject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.projects.index') }}">All Project</a>
                <a class="collapse-item" href="{{ route('admin.projects.create') }}">Add Project</a>
                <a class="collapse-item" href="{{ route('admin.projects.trash') }}">Trash</a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedetail"
            aria-expanded="true" aria-controls="collapsedetail">
            <i class="fas fa-users-cog"></i>
            <span>Details</span>
        </a>
        <div id="collapsedetail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.Project_details.index') }}">All Details</a>
                <a class="collapse-item" href="{{ route('admin.Project_details.create') }}">Add Details</a>
                <a class="collapse-item" href="{{ route('admin.Project_details.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsequestion"
            aria-expanded="true" aria-controls="collapsequestion">
            <i class="fas fa-users-cog"></i>
            <span>Question</span>
        </a>
        <div id="collapsequestion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.questions.index') }}">All Question</a>
                <a class="collapse-item" href="{{ route('admin.questions.create') }}">Add Question</a>
                <a class="collapse-item" href="{{ route('admin.questions.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseslider"
            aria-expanded="true" aria-controls="collapseslider">
            <i class="fas fa-users-cog"></i>
            <span>Slider</span>
        </a>
        <div id="collapseslider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.sliders.index') }}">All Slider</a>
                <a class="collapse-item" href="{{ route('admin.sliders.create') }}">Add Slider</a>
                <a class="collapse-item" href="{{ route('admin.sliders.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseteam"
            aria-expanded="true" aria-controls="collapseteam">
            <i class="fas fa-users-cog"></i>
            <span>Team</span>
        </a>
        <div id="collapseteam" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.teams.index') }}">All Team</a>
                <a class="collapse-item" href="{{ route('admin.teams.create') }}">Add Team</a>
                <a class="collapse-item" href="{{ route('admin.teams.trash') }}">Trash</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsservice"
            aria-expanded="true" aria-controls="collapsservice">
            <i class="fas fa-users-cog"></i>
            <span>Service</span>
        </a>
        <div id="collapsservice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.services.index') }}">All Service</a>
                <a class="collapse-item" href="{{ route('admin.services.create') }}">Add Service</a>
                <a class="collapse-item" href="{{ route('admin.services.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapstestimonial"
            aria-expanded="true" aria-controls="collapstestimonial">
            <i class="fas fa-users-cog"></i>
            <span>Testimonial</span>
        </a>
        <div id="collapstestimonial" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">All Testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
