<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" " class="brand-link">
        <img src=" " class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EMPLOYEE MANAGEMENT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Profile (Employee only) -->
                @employee
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                @endemployee

                <!-- Organization (Admin only) -->
                @admin
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#organizationDropdown" role="button"
                        data-bs-toggle="collapse" aria-expanded="false">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Organization</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="organizationDropdown">
                        <li class="nav-item">
                            <a href="{{ route('organization.department') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organization.designationList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endadmin

                <!-- PayGrade (Admin only) -->
                @admin
                <li class="nav-item">
                    <a href="{{ route('salary.create.form') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>PayGrade</p>
                    </a>
                </li>
                @endadmin

                <!-- Employees (Admin only) -->
                @admin
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#employeesDropdown" role="button"
                        data-bs-toggle="collapse" aria-expanded="false">
                        <i class="nav-icon fas fa-user-group"></i>
                        <p>Employees</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="employeesDropdown">
                        <li class="nav-item">
                            <a href="{{ route('manageEmployee.addEmployee') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manageEmployee.ViewEmployee') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Employee</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endadmin

                <!-- Provident Fund (Admin and Employee) -->
                <li class="nav-item">
                    @admin
                    <a href="{{ route('providentList') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Provident Fund</p>
                    </a>
                    @endadmin
                    @employee
                    <a href="{{ route('employeeProvident') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Provident Fund</p>
                    </a>
                    @endemployee
                </li>

                <!-- Attendance -->
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#attendanceDropdown" role="button"
                        data-bs-toggle="collapse" aria-expanded="false">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Attendance</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="attendanceDropdown">
                        @admin
                        <li class="nav-item">
                            <a href="{{ route('attendance.viewAttendance') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance Record</p>
                            </a>
                        </li>
                        @endadmin
                        @employee
                        <li class="nav-item">
                            <a href="{{ route('attendance.giveAttendance') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Give Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('attendance.myAttendance') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Attendance</p>
                            </a>
                        </li>
                        @endemployee
                    </ul>
                </li>

                <!-- Leave -->
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#leaveDropdown" role="button" data-bs-toggle="collapse"
                        aria-expanded="false">
                        <i class="nav-icon fas fa-person-walking-arrow-right"></i>
                        <p>Leave</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="leaveDropdown">
                        @employee
                        <li class="nav-item">
                            <a href="{{ route('leave.leaveForm') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Apply Leave</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leave.myLeave') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Leave</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leave.myLeaveBalance') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Leave Balance</p>
                            </a>
                        </li>
                        @endemployee
                        @admin
                        <li class="nav-item">
                            <a href="{{ route('leave.leaveStatus') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leave.leaveType') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Type</p>
                            </a>
                        </li>
                        @endadmin
                    </ul>
                </li>

                <!-- Task Management -->
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#taskDropdown" role="button" data-bs-toggle="collapse"
                        aria-expanded="false">
                        <i class="nav-icon fas fa-list-check"></i>
                        <p>Task</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="taskDropdown">
                        @admin
                        <li class="nav-item">
                            <a href="{{ route('createTask') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign Task</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('taskList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Task List</p>
                            </a>
                        </li>
                        @endadmin
                        @employee
                        <li class="nav-item">
                            <a href="{{ route('myTask') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Task</p>
                            </a>
                        </li>
                        @endemployee
                    </ul>
                </li>

                <!-- Payroll -->
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-target="#payrollDropdown" role="button"
                        data-bs-toggle="collapse" aria-expanded="false">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Payroll</p>
                    </a>
                    <ul class="nav nav-treeview collapse" id="payrollDropdown">
                        @admin
                        <li class="nav-item">
                            <a href="{{ route('payroll.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Payroll</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payroll.view') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payroll List</p>
                            </a>
                        </li>
                        @endadmin
                        @employee
                        <li class="nav-item">
                            <a href="{{ route('myPayroll') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Payroll</p>
                            </a>
                        </li>
                        @endemployee
                    </ul>
                </li>
                <li class="nav-item">
                    @admin
                    <a href="{{ route('users.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Users</p>
                    </a>
                    @endadmin
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>