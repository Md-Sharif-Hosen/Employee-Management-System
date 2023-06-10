<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                {{-- @dd(auth()->user()->role_id) --}}
                @if (auth()->user()->role_id == 1)
                    <li class="submenu">
                        <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span></span></a>
                        {{-- <ul>
                        <li><a href="index.html">Admin Dashboard</a></li>
                        <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                        <li><a href="student-dashboard.html">Student Dashboard</a></li>
                    </ul> --}}
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Employees Document</span>
                            <span class="menu-arrow"></span></a>
                        <ul>

                            <li><a href="{{ route('admin.employee.view') }}">Employee View</a></li>
                            <li><a href="{{ route('admin.employee.add') }}">Employee Add</a></li>
                            <li><a href="{{ route('admin.attendance.view') }}">Employee Attendance</a></li>

                        </ul>
                    </li>
                @endif
                {{-- <li class="submenu">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Students</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="students.html">Student List</a></li>
                        <li><a href="student-details.html">Student View</a></li>
                        <li><a href="add-student.html">Student Add</a></li>
                        <li><a href="edit-student.html">Student Edit</a></li>
                    </ul>
                </li> --}}
                @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 1)
                    <li class="">
                        <a href="{{ route('admin.attendance.add') }}"><i class="fas fa-chalkboard"></i> <span> Employees
                                Attendance</span> </a>
                    </li>
                @endif



                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                </li>
            </ul>
        </div>
    </div>
</div>
