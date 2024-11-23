<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">FIRDAUS | STORE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm"><a href="#">Kasir</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('kasir.dashboard') ? 'active' : '' }}"><a class="nav-link" 
            href="{{ route('kasir.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <!-- Menu Transaksi -->
            <li class="#">
            <a class="nav-link" href="#"><i class="fas fa-receipt"></i> 
            <span>Transaksi</span></a></li>
        </ul>
    </aside>
</div>