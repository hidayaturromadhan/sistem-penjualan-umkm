<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <img src="{{ asset('assets/user/img/logo.png') }}" alt="logo" style="max-height: 50px; height: auto; max-width: 100%; margin-right: 8px;">
            <a href="{{ route('kasir.dashboard') }}">FIRDAUS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm"><a href="#">Kasir</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('kasir.dashboard') }}"><a class="nav-link" style="color: #1A5F3C;" href="{{ route('kasir.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <!-- Menu Transaksi -->
            <li class="#">
            <a class="nav-link" style="color: #1A5F3C;" href="#"><i class="fas fa-receipt"></i> 
            <span>Transaksi</span></a></li>
        </ul>
    </aside>
</div>