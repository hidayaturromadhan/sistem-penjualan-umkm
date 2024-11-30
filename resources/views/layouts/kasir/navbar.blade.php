<div class="navbar-bg" style="background-color: #1A5F3C;"></div>
<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #1A5F3C;">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg" id="sidebar-toggle"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <div class="navbar-nav navbar-right">
        <ul class="navbar-nav mr-3">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
