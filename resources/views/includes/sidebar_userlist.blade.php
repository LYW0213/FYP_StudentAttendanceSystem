<!DOCTYPE html>
<html lang="en">

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="justify-content-between align-items-center theme-toggle" style="margin-bottom: -25%">
                        <div class="logo">
                            <a><img src="{{ asset('Template/assets/images/logo/Logo.png') }}" alt="Logo"
                                    srcset="" style="width: 100%; height: 100%"></a>
                            <button id="toggle-dark" class="btn btn-toggle-dark">
                            </button>
                            <div class="sidebar-toggler x">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                        class="bi bi-x bi-middle"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        {{-- Dashboard --}}
                        {{-- Admin --}}
                        @if (Auth::user()->roles_id == 1)
                            <li class="sidebar-item">
                                <a href="{{ route('dashboard') }}" class="sidebar-link">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            {{-- Lecturer --}}
                        @elseif (Auth::user()->roles_id == 2)
                            <li class="sidebar-item">
                                <a href="{{ route('dashboard') }}" class="sidebar-link">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        @endif

                        {{-- Users List --}}
                        {{-- Admin --}}
                        @if (Auth::user()->roles_id == 1)
                            <li class="sidebar-item  has-sub active">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-lines-fill"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ route('admin.adminlecturerlist') }}">Admin & Lecturer List</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="{{ route('admin.studentlist') }}">Student List</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{-- Faculty & Programs --}}
                        {{-- Admin --}}
                        @if (Auth::user()->roles_id == 1)
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Faculty & Programs</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="{{ route('admin.facultylist') }}">Faculty List</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="{{ route('admin.programslist') }}">Programs List</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{-- subject list --}}
                        {{-- Admin --}}
                        @if (Auth::user()->roles_id == 1)
                            <li class="sidebar-item">
                                <a href="{{ route('subjectlist') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Subject List</span>
                                </a>
                            </li>

                            {{-- Lecturer --}}
                        @elseif (Auth::user()->roles_id == 2)
                            <li class="sidebar-item">
                                <a href="{{ route('subjectlist') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Subject List</span>
                                </a>
                            </li>
                        @endif

                        {{-- Logout --}}
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right" style="color: red"></i>
                                <span style="color: red">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
