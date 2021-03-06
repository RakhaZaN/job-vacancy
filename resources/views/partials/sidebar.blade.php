<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BSG</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BSG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown {{ Request::routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('job-vacancy.*') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('job-vacancy.index') }}"><i class="fas fa-universal-access"></i> <span>Job Vacancy</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('announcement') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('announcement') }}"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('news') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('news') }}"><i class="fas fa-newspaper"></i> <span>News & Events</span></a>
            </li>
            @if (auth()->user()->role != 'admin')
            <li class="nav-item dropdown {{ Request::routeIs('aboutus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('aboutus') }}"><i class="fas fa-info-circle"></i> <span>About Us</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('hta') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('hta') }}"><i class="fas fa-question-circle"></i> <span>How to Apply</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-phone"></i> <span>Contact</span></a>
            </li>
            @endif
            @if (auth()->user()->role == 'admin')
            <li class="nav-item dropdown {{ Request::routeIs('admin.report') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.report.index') }}"><i class="fas fa-file-alt"></i> <span>Report</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::routeIs('admin.register') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('admin.register') }}"><i class="fas fa-users"></i> <span>Add Admin</span></a>
            </li>
            @endif
        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Log out
            </a>
        </div> --}}
    </aside>
</div>
