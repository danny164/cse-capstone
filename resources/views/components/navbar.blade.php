<div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

    <a class="navbar-brand" href="{{ url('/home') }}">
        <img alt="dtu" src="{{ url('assets/img/duytan-university.svg') }}"/>
    </a>

    @auth
        <div class="d-flex align-items-center">

            <!-- Already Logged in -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-block d-lg-none ml-2">
                <div class="dropdown">
                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img alt="avatar" src="{{ url('storage/images/'.Auth::user()->avatar_path) }}" class="avatar" />
                    </a>

                    <div class="dropdown-menu dropdown-menu-right text-center">

                        <a href="{{ url('/profile/'.Auth::user()->id) }}" class="dropdown-item">Profile</a>

                        @admin
                            <a href="{{ url('/admin/control/users') }}" class="dropdown-item">Control Panel</a>
                        @endadmin

                        <a href="{{ url('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="dropdown-item" >
                            {{ __('Log out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
            <ul class="navbar-nav d-lg-block">

                <li class="nav-item">

                    @admin
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">Announcements</a>
                        <div id="submenu-1" class="collapse" data-parent="#navbar-collapse">
                            <ul class="nav nav-small flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/announcements/new') }}">New Announcement</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/announcements') }}">Announcement Management</a>
                                </li>

                            </ul>
                        </div>
                    @else
                        <a class="nav-link" href="{{ url('/home') }}">Announcements</a>
                    @endadmin

                </li>

                <li class="nav-item">
                    @admin
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Semesters</a>
                        <div id="submenu-2" class="collapse" data-parent="#navbar-collapse">
                            <ul class="nav nav-small flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/semesters/new') }}">New Semester</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/semesters') }}">Semester Management</a>
                                </li>

                            </ul>
                        </div>
                    @endadmin

                    @mentor
                        <a class="nav-link" href="{{ url('#') }}">Tracking Team</a>
                    @endmentor

                    @user
                        <a class="nav-link" href="{{ url('/semesters') }}">My Team</a>
                    @enduser

                </li>

                <li class="nav-item">

                    @admin
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Topics</a>
                        <div id="submenu-3" class="collapse" data-parent="#navbar-collapse">
                            <ul class="nav nav-small flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/topics/new') }}">New Topic</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/topics/pending') }}">Pending Topics</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/topics') }}">Topic Management New</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"href="{{ url('/admin/old-topics') }}">Topic Management Old</a>
                                </li>

                            </ul>
                        </div>
                    @endadmin

                    @mentor
                        <a class="nav-link" href="{{ url('#') }}">Topic List</a>
                    @endmentor

                    @user
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Topics</a>
                        <div id="submenu-3" class="collapse" data-parent="#navbar-collapse">
                            <ul class="nav nav-small flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('topics') }}">Pick Topic</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('topics/request') }}">Request Topic</a>
                                </li>

                            </ul>
                        </div>
                    @enduser

                </li>

                <li class="nav-item">

                    @admin
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">Plans</a>
                        <div id="submenu-4" class="collapse" data-parent="#navbar-collapse">
                            <ul class="nav nav-small flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/plans/new') }}">New Plan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/plans') }}">Plan Management</a>
                                </li>

                            </ul>
                        </div>
                    @endadmin

                    @user
                        <a class="nav-link" href="{{ url('#') }}">Reports</a>
                    @enduser

                </li>

                @user
                    <hr>

                    <div class="d-none d-lg-block w-100">
                        <span class="text-small text-muted">Quick Access</span>
                        <ul class="nav nav-small flex-column mt-2">
                            <li class="nav-item">
                                <a href="#" class="nav-link">{{  Str::limit('Team 34', 20, '...') }}</a>
                            </li>
                        </ul>
                    </div>
                @enduser

                @admin
                <li class="nav-item">

                    <a class="nav-link" href="{{ url('/admin/statistics') }}">Statistics</a>

                </li>

                <hr>

                <li class="nav-item">

                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10">Faculties</a>
                    <div id="submenu-10" class="collapse" data-parent="#navbar-collapse">
                        <ul class="nav nav-small flex-column">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/faculties/new') }}">New Faculty</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/faculties') }}">Faculty Management</a>
                            </li>

                        </ul>
                    </div>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Departments</a>
                    <div id="submenu-11" class="collapse" data-parent="#navbar-collapse">
                        <ul class="nav nav-small flex-column">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/departments/new') }}">New Department</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/departments') }}">Department Management</a>
                            </li>

                        </ul>
                    </div>

                </li>
                @endadmin

            </ul>
            <hr>

            <div>
                <form>
                    <div class="input-group input-group-dark input-group-round">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">search</i>
                            </span>
                        </div>
                        <input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search app">
                    </div>
                </form>
            </div>
        </div>

        <div class="d-none d-lg-block">

            <!-- already Logged in -->
            <div class="dropup media align-items-center">
                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img alt="avatar" src="{{ url('storage/images/'.Auth::user()->avatar_path) }}"  class="avatar avatar--2" />
                </a>
                <p class="d-inline-block ml-1 mb-0 text-light">Welcome, <br>
                    <span class="text-warning">
                    {{  Str::limit(Auth::user()->full_name, 20, '...')}}

                    </span>
                </p>

                <div class="dropdown-menu text-center">

                    <a href="{{ url('/profile/'.Auth::user()->id) }}" class="dropdown-item">Profile</a>

                    @admin
                        <a href="{{ url('/admin/control/users') }}" class="dropdown-item">Control Panel</a>
                    @endadmin

                    <a href="{{ url('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="dropdown-item" >
                        {{ __('Log out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- already Logged in -->

        </div>
    @endauth

    @guest
        <div class="d-flex align-items-center">

            <!-- For guest only -->
            <div class="d-block d-lg-none">
            <a href="{{url('/login')}}"><button type="button" class="btn btn-outline-warning">Login</button></a>
            </div>

            <div class="d-block d-lg-none mx-2">
            <a href="{{url('/register')}}"><button type="button" class="btn btn-outline-info">Register</button></a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
            <ul class="navbar-nav d-lg-block">

                <li class="nav-item">

                    <a class="nav-link" href="#">About us</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#">Contact</a>

                </li>


            </ul>
            <hr>

            <div class="d-none d-lg-block help-box">
                <h5 class="text-muted mt-0">For help?</h5>
                <p class="text-break"><span class="text-custom text-word-break">Email:</span> <br/>help@capstonetracking.vn</p>
            </div>

        </div>

        <div class="d-none d-lg-block">
            <!-- For guest only -->
            <a href="{{url('/login')}}"><button type="button" class="btn btn-outline-warning">Login</button></a>
            <a href="{{url('/register')}}" ><button type="button" class="btn btn-outline-info">Register</button></a>
        </div>
    @endguest
</div>
