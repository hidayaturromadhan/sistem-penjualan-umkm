<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">FIRDAUS | STORE</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm"><a href="#">Admin</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link" 
            href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <!-- Menu Produk -->
            <li class="#">
            <a class="nav-link" href="#"><i class="fas fa-box"></i> 
            <span>Produk</span></a></li>
            <!-- Menu Kasir -->
            <li class="#">
            <a class="nav-link" href="#"><i class="fas fa-cash-register"></i> 
            <span>Kasir</span></a></li>
            <!-- Menu Laporan -->
            <li class="#">
            <a class="nav-link" href="#"><i class="	far fa-clipboard"></i> 
            <span>Laporan penjualan</span></a></li>
        </ul>
    </aside>
</div>