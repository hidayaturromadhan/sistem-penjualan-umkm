<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/user/img/logo.png') }}" alt="logo" style="max-height: 50px; height: auto; max-width: 100%; margin-right: 8px;"> 
            <a href="{{ route('admin.dashboard') }}">FIRDAUS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm"><a href="#">Admin</a></div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') }}" ><a class="nav-link" style="color: #1A5F3C;" href="{{ route('admin.dashboard') }}"><i class="fas fa-home" style="color: #1A5F3C;"></i> <span style="color: #1A5F3C;">Dashboard</span></a></li>
            <!-- Menu Produk -->
            <li class="{{ Request::is('product*') }}">
            <a class="nav-link" style="color: #1A5F3C;" href="{{ route('admin.produk') }}"><i class="fas fa-box"></i> 
            <span>Produk</span></a></li>
            <!-- Menu Kasir -->
            <li class="{{ Route::is('admin.kasir') }}">
            <a class="nav-link" style="color: #1A5F3C;" href="{{ route('admin.kasir') }}"><i class="fas fa-user-tie"></i> 
            <span>Kasir</span></a></li>
            <!-- Menu Laporan -->
            <li class="{{ Route::is('admin.laporanPenjualan') }}">
            <a class="nav-link" style="color: #1A5F3C;" href="{{ Route('admin.laporanPenjualan') }}"><i class="	far fa-clipboard"></i> 
            <span>Laporan penjualan</span></a></li>
        </ul>
    </aside>
</div>