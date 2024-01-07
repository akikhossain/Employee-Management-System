<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-info shadow"><a
            class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#"></a><a
            class="navbar-brand fw-bold text-uppercase text-black text-base" href="{{ route('dashboard') }}"><span
                class="d-none d-brand-partial">Employee </span><span class="d-none d-sm-inline">Management
                System</span></a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="avatar p-1"
                        src="{{ isset(auth()->user()->employee) && auth()->user()->employee->employee_image ? url('/uploads//' . auth()->user()->employee->employee_image) : asset('assests/image/default.png') }}"
                        alt="admin">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                    <div class="dropdown-header text-gray-700">
                        <h6 class="text-uppercase font-weight-bold">{{ auth()->user()->name }}</h6><small
                            class="text-uppercase">{{ auth()->user()->role }}</small>
                    </div>
                    <div class="dropdown-divider"></div><a class="dropdown-item"
                        href="{{ route('admin.logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>