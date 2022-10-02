
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


    @if(Gate::any(['all_about','add_about','delete_about','edit_about']))
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
    @endif



    @if(Gate::any(['all_award','add_award','delete_award','edit_award']))
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
    @endif



    @if(Gate::any(['all_department','add_department','delete_department','edit_department']))
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
    @endif



    @if(Gate::any(['all_partner','add_partner','delete_partner','edit_partner']))
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
    @endif



    @if(Gate::any(['all_doctor','add_doctor','delete_doctor','edit_doctor']))
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
    @endif


    @if(Gate::any(['all_feature','add_feature','delete_feature','edit_feature']))
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
    @endif


    @if(Gate::any(['all_qualification','add_qualification','delete_qualification','edit_qualification']))
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
    @endif


    @if(Gate::any(['all_testimonial','add_teall_testimonial','delete_teall_testimonial','edit_teall_testimonial']))
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
    @endif

    @if(Gate::any(['all_schedule','add_schedule','delete_schedule','edit_schedule']))
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
    @endif


    @if(Gate::allows(['all_user']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>User</span></a>
        </li>
    @endif


    @if(Gate::any(['all_role','add_role','delete_role','edit_role']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item mb-4">
        <a class="nav-link" href="{{ route('admin.roles.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Role</span></a>
        </li>
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
