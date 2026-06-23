<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><h4 class="m-0 text-primary">PastiBeres!</h4></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu Utama</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Master Data</li>

                <li class="sidebar-item {{ request()->routeIs('tipelayanan.*') ? 'active' : '' }}">
                    <a href="{{ route('tipelayanan.index') }}" class='sidebar-link'>
                        <i class="bi bi-layers-fill"></i>
                        <span>Tipe Layanan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('bengkel.*') ? 'active' : '' }}">
                    <a href="{{ route('bengkel.index') }}" class='sidebar-link'>
                        <i class="bi bi-shop"></i>
                        <span>Cabang Bengkel</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Users Akses</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('promo.*') ? 'active' : '' }}">
                    <a href="{{ route('promo.index') }}" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Promo Servis</span>
                    </a>
                </li>

                <li class="sidebar-title">Reports</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                        <span>Cetak Laporan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#">Laporan Layanan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">Laporan Bengkel</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">Laporan Promo</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>