
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

        @canany(['about-list','about-create','about-edit','about-delete'])
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseabout"
                aria-expanded="true" aria-controls="collapseabout">
                <i class="fas fa-users-cog"></i>
                <span>About</span>
            </a>
            <div id="collapseabout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.about.index') }}">All About</a>
                    <a class="collapse-item" href="{{ route('admin.about.create') }}">add About</a>
                    <a class="collapse-item" href="{{ route('admin.about.trash') }}">Trash</a>
                </div>
            </div>
        </li>
        @endcanany

        @canany(['award-list','award-create','award-edit','award-delete'])
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseaward"
                aria-expanded="true" aria-controls="collapseaward">
                <i class="fas fa-users-cog"></i>
                <span>Award</span>
            </a>
            <div id="collapseaward" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.awards.index') }}">All Award</a>
                    <a class="collapse-item" href="{{ route('admin.awards.create') }}">Add Award</a>
                    <a class="collapse-item" href="{{ route('admin.awards.trash') }}">Trash</a>
                </div>
            </div>
        </li>
        @endcanany

        @canany(['department-list','department-create','department-edit','department-delete'])
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedepartment"
                aria-expanded="true" aria-controls="collapsedepartment">
                <i class="fas fa-users-cog"></i>
                <span>Department</span>
            </a>
            <div id="collapsedepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.departments.index') }}">All Department</a>
                    <a class="collapse-item" href="{{ route('admin.departments.create') }}">Add Department</a>
                    <a class="collapse-item" href="{{ route('admin.departments.trash') }}">Trash</a>
                </div>
            </div>
        </li>
        @endcanany

        @canany(['partner-list','partner-create','partner-edit','partner-delete'])
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepartners"
                aria-expanded="true" aria-controls="collapsepartners">
                <i class="fas fa-users-cog"></i>
                <span>Partner</span>
            </a>
            <div id="collapsepartners" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.partners.index') }}">All Partner</a>
                    <a class="collapse-item" href="{{ route('admin.partners.create') }}">Add Partner</a>
                </div>
            </div>
        </li>
        @endcanany

        @can('doctor-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedoctors"
                aria-expanded="true" aria-controls="collapsedoctors">
                <i class="fas fa-users-cog"></i>
                <span>Doctor</span>
            </a>
            <div id="collapsedoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.doctors.index') }}">All Doctor</a>
                    <a class="collapse-item" href="{{ route('admin.doctors.create') }}">Add Doctor</a>
                    <a class="collapse-item" href="{{ route('admin.doctors.trash') }}">Trash</a>

                </div>
            </div>
        </li>
        @endcan

        @can('feature-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefeature"
            aria-expanded="true" aria-controls="collapsefeature">
            <i class="fas fa-users-cog"></i>
            <span>Feature</span>
        </a>
        <div id="collapsefeature" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.features.index') }}">All Feature</a>
                <a class="collapse-item" href="{{ route('admin.features.create') }}">Add Feature</a>
                <a class="collapse-item" href="{{ route('admin.features.trash') }}">Trash</a>

            </div>
        </div>
         </li>
         @endcan

        @can('qualifications-list')
       <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsequalification"
                aria-expanded="true" aria-controls="collapsequalification">
                <i class="fas fa-users-cog"></i>
                <span>Qualification</span>
            </a>
            <div id="collapsequalification" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.qualifications.index') }}">All Qualification</a>
                    <a class="collapse-item" href="{{ route('admin.qualifications.create') }}">Add Qualification</a>
                    <a class="collapse-item" href="{{ route('admin.qualifications.trash') }}">Trash</a>

                </div>
            </div>
        </li>
        @endcan

        @can('testimonial-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetestimonial"
                aria-expanded="true" aria-controls="collapsetestimonial">
                <i class="fas fa-users-cog"></i>
                <span>Testimonial</span>
            </a>
            <div id="collapsetestimonial" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">All Testimonial</a>
                    <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
                    <a class="collapse-item" href="{{ route('admin.testimonials.trash') }}">Trash</a>

                </div>
            </div>
        </li>
        @endcan

        @can('schedule-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseschedule"
                aria-expanded="true" aria-controls="collapseschedule">
                <i class="fas fa-users-cog"></i>
                <span>Schedule</span>
            </a>
            <div id="collapseschedule" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.schedules.index') }}">All Schedule</a>
                    <a class="collapse-item" href="{{ route('admin.schedules.create') }}">Add Schedule</a>
                    <a class="collapse-item" href="{{ route('admin.schedules.trash') }}">Trash</a>

                </div>
            </div>
        </li>
        @endcan

        @can('role-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
                aria-expanded="true" aria-controls="collapseRole">
                <i class="fas fa-users-cog"></i>
                <span>Role</span>
            </a>
            <div id="collapseRole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.roles.index') }}">All Role</a>
                    <a class="collapse-item" href="{{ route('admin.roles.create') }}">Add Role</a>

                </div>
            </div>
        </li>
        @endcan

        @can('user-list')
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUSer"
                aria-expanded="true" aria-controls="collapseUSer">
                <i class="fas fa-users-cog"></i>
                <span>User</span>
            </a>
            <div id="collapseUSer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.users.index') }}">All User</a>
                    <a class="collapse-item" href="{{ route('admin.users.create') }}">Add User</a>

                </div>
            </div>
        </li>

        @endcan



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
