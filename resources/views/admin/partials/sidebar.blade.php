<div class="sidebar  " id="sidebar">

    {{-- Dashboard --}}
    <ul class="list-unstyled">
        <li class="sidebar-list-item"><a class="sidebar-link text-muted active" href="{{ url('/') }}">
                <span class="sidebar-link-title fs-5">Dashboards </span></a>
        </li>

        {{-- Employees --}}
        <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#cmsDropdown"
                role="button" aria-expanded="false" data-bs-toggle="collapse">
                <span class="sidebar-link-title fs-5">Employees</span></a>
            <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted"
                        href="{{ url('/manageEmployee/addEmployee') }}">Add Employee</a></li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted"
                        href="{{ url('/manageEmployee/viewEmployee') }}">View Employee</a></li>
            </ul>
        </li>

        {{-- Department --}}
        <li class="sidebar-list-item py-2 "><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Department</span></a>
        </li>

        {{-- Task --}}
        <li class="sidebar-list-item py-2 "><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Task</span></a>
        </li>

        {{-- Manage Leave --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Manage Leave </span></a>
        </li>

        {{-- Manage Tour --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Manage Tour </span></a>
        </li>

        {{-- Payroll --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#">
                <span class="sidebar-link-title fs-5">Payroll</span></a>
        </li>

        {{-- Attendance --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted "
                href="{{ route('attendance.addAttendance') }}" data-bs-target="#tablesDropdown" role="button"
                aria-expanded="false" data-bs-toggle="collapse">
                <span class="sidebar-link-title fs-5 ">Attendance</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="tablesDropdown">
                <li class="sidebar-list-item py-2 fs-6 "><a class="sidebar-link text-muted"
                        href="{{ route('attendance.viewAttendance') }}">Attendance
                        List</a>
                </li>
            </ul>
        </li>

        {{-- Example --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                <span class="sidebar-link-title fs-5">Example</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="widgetsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted"
                        href="widgets-stats.html">Stats</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted" href="widgets-data.html">Data</a>
                </li>
            </ul>
        </li>
    </ul>

</div>
