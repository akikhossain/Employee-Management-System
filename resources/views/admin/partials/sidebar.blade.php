<div class="sidebar" id="sidebar">

    {{-- Dashboard --}}
    <ul class="list-unstyled mb-5">
        <li class="sidebar-list-item border-top border-bottom"><a class="sidebar-link text-muted active"
                href="{{ route('dashboard') }}">
                <span class="sidebar-link-title fs-5">Dashboards</span></a>
        </li>


        {{-- User Profile --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted"
                href="{{ route('profile') }}"><i class="fa-regular fa-user me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Profile</span></a>
        </li>

        {{-- Notice --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted"
                href="{{ route('show.notice') }}"><i class="fa-solid fa-check me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Notices</span></a>
        </li>

        {{-- Attendance --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted " href=""
                data-bs-target="#tablesDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-regular fa-clock me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Attendance</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="tablesDropdown">
                <li class="sidebar-list-item py-2 fs-6 "><a class="sidebar-link text-muted ms-3"
                        href="{{ route('attendance.viewAttendance') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Attendance
                        Record</a>
                </li>
                <li class="sidebar-list-item fs-6 "><a class="sidebar-link text-muted ms-3"
                        href="{{ route('attendance.giveAttendance') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Give Attendance</a>
                </li>
                <li class="sidebar-list-item fs-6 "><a class="sidebar-link text-muted ms-3"
                        href="{{ route('attendance.myAttendance') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>My Attendance</a>
                </li>
            </ul>
        </li>

        {{-- Organization --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#widgetsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-building me-2  text-info"></i>
                <span class="sidebar-link-title fs-5">Organization</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="widgetsDropdown">
                <li class="sidebar-list-item py-2  fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('organization.department') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Department</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('organization.designation') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Designation</a>
                </li>
            </ul>
        </li>

        {{-- Employees --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#cmsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-user-group me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Employees</span></a>
            <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('manageEmployee.addEmployee') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Add
                        Employee</a></li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('manageEmployee.ViewEmployee') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>View Employee</a></li>
            </ul>
        </li>


        {{-- Task --}}
        {{-- <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted " href="#"><i
                    class="fa-solid fa-list-check me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Manage Task</span></a>
        </li> --}}

        {{-- Manage Leave --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#componentsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-person-walking-arrow-right me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Leave</span></a>
            <ul class="sidebar-menu   list-unstyled collapse " id="componentsDropdown">
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.leaveForm') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Apply
                        Leave</a>
                </li>
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.myLeave') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>My Leave</a>
                </li>
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.myLeaveBalance') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>My Leave Balance</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.leaveStatus') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Leave Request</a>
                </li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('leave.leaveType') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Leave Type</a>
                </li>
            </ul>
        </li>

        {{-- Payroll --}}
        <li class="sidebar-list-item py-2"><a class="sidebar-link text-muted " href="#"
                data-bs-target="#e-commerceDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"><i
                    class="fa-solid fa-file-invoice-dollar me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Payroll</span></a>
            <ul class="sidebar-menu list-unstyled collapse " id="e-commerceDropdown">
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('payroll.create') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Create Payroll</a>
                </li>
                <li class="sidebar-list-item py-2 fs-6"><a class="sidebar-link text-muted ms-3"
                        href="{{ route('payroll.view') }}"><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>Payroll List</a></li>
                <li class="sidebar-list-item fs-6"><a class="sidebar-link text-muted ms-3" href=""><i
                            class="fa-regular fa-circle-right fa-sm me-1 text-info"></i>My Payroll</a></li>
            </ul>
        </li>

        {{-- Salary Structure --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted"
                href="{{ route('salary.create.form') }}"><i class="fa-solid fa-dollar-sign me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Salary Structure</span></a>
        </li>

        {{-- Users --}}
        <li class="sidebar-list-item py-2 border-top border-bottom"><a class="sidebar-link text-muted "
                href="{{ route('users.list') }}"><i class="fa-solid fa-circle-user me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Users</span></a>
        </li>
    </ul>

    {{-- Frontend Sidebar --}}
    <div class="mt-5">
        <li class="list-unstyled"><a class="sidebar-link text-muted " href="{{ route('service.form') }}"><i
                    class="fa-brands fa-servicestack  me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Services</span></a>
        </li>
        <li class="list-unstyled"><a class="sidebar-link text-muted " href="{{ route('notice') }}"><i
                    class="fa-solid fa-volume-high  me-2 text-info"></i>
                <span class="sidebar-link-title fs-5">Create Notice</span></a>
        </li>
    </div>

</div>