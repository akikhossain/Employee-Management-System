<div class="sidebar" id="sidebar">

    {{-- Dashboard --}}
    <ul class="list-unstyled">
        <li class="sidebar-list-item border"><a class="sidebar-link text-muted active" href="{{ url('/') }}">
                <span class="sidebar-link-title fs-5">Dashboards </span></a>
        </li>

        {{-- Employees --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#cmsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-user-group me-2 "></i>
                <span class="sidebar-link-title fs-5">Employees</span></a>
            <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('manageEmployee.addEmployee') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>Add
                        Employee</a></li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('manageEmployee.ViewEmployee') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>View Employee</a></li>
            </ul>
        </li>

        {{-- Organization --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-building me-2"></i>
                <span class="sidebar-link-title fs-5">Organization</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="widgetsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('organization.department') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>Department</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('organization.designation') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>Designation</a>
                </li>
            </ul>
        </li>

        {{-- Task --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted " href="#"><i
                    class="fa-solid fa-list-check me-2"></i>
                <span class="sidebar-link-title fs-5">Task</span></a>
        </li>

        {{-- Manage Leave --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#componentsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-person-walking-arrow-right me-2"></i>
                <span class="sidebar-link-title fs-5">Leave</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="componentsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.leaveForm') }}"><i class="fa-regular fa-circle-right fa-sm me-1"></i>Apply
                        Leave</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.leaveStatus') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>Leave Status</a>
                </li>
            </ul>
        </li>

        {{-- Manage Tour --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted " href="#"><i
                    class="fa-solid fa-location-dot me-2"></i>
                <span class="sidebar-link-title fs-5">Manage Tour </span></a>
        </li>

        {{-- Payroll --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted " href="#"><i
                    class="fa-solid fa-file-invoice-dollar me-2"></i>
                <span class="sidebar-link-title fs-5">Payroll</span></a>
        </li>

        {{-- Attendance --}}
        <li class="sidebar-list-item py-2 border"><a class="sidebar-link text-muted "
                href="{{ route('attendance.addAttendance') }}" data-bs-target="#tablesDropdown" role="button"
                aria-expanded="false" data-bs-toggle="collapse"><i class="fa-regular fa-clock  me-2"></i>
                <span class="sidebar-link-title fs-5">Attendance</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="tablesDropdown">
                <li class="sidebar-list-item py-2 fs-6 "><a class="sidebar-link text-muted ms-3"
                        href="{{ route('attendance.viewAttendance') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1"></i>Attendance
                        List</a>
                </li>
            </ul>
        </li>

        {{-- Example --}}
        {{-- <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                <span class="sidebar-link-title fs-5">Example</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="widgetsDropdown">
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted"
                        href="widgets-stats.html">Stats</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted" href="widgets-data.html">Data</a>
                </li>
            </ul>
        </li> --}}
    </ul>

</div>
