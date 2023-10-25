<div class="sidebar py-3" id="sidebar">

    <ul class="list-unstyled">
        <li class="sidebar-list-item"><a class="sidebar-link text-muted active" href="{{ url('/') }}">
                <span class="sidebar-link-title fs-5">Dashboards </span></a>
        </li>
        <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#cmsDropdown"
                role="button" aria-expanded="false" data-bs-toggle="collapse">
                <span class="sidebar-link-title fs-5">Employees</span></a>
            <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                <li class="sidebar-list-item"><a class="sidebar-link text-muted"
                        href="{{ url('/manageEmployee/addEmployee') }}">Add Employee</a></li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted"
                        href="{{ url('/manageEmployee/viewEmployee') }}">View Employee</a></li>
            </ul>
        </li>
        <li class="sidebar-list-item py-2 "><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Department</span></a>
        </li>

        <li class="sidebar-list-item py-2 "><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">View Work Details</span></a>
        </li>
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Manage Leave </span></a>
        </li>
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Manage Tour </span></a>
        </li>
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Payroll</span></a>
        </li>
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5 ">Attendance</span></a>
        </li>
    </ul>

</div>
