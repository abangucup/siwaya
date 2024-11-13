<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="{{ route('dashboard') }}" class="d-block text-decoration-none">
            <img src="{{ asset('assets/images/logo_provinsi.png') }}" alt="logo-icon">
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
            
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Panel Data</span>
            </li>
            <li class="menu-item open">
                <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i data-feather="command" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('instansi.index') }}" class="menu-link {{ request()->routeIs('instansi.*') ? 'active' : '' }}">
                    <i data-feather="briefcase" class="menu-icon tf-icons"></i>
                    <span class="title">Instansi</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('kategori.index') }}" class="menu-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Kategori</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('kondisi.index') }}" class="menu-link {{ request()->routeIs('kondisi.*') ? 'active' : '' }}">
                    <i data-feather="filter" class="menu-icon tf-icons"></i>
                    <span class="title">Kondisi</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('wbtb.index') }}" class="menu-link {{ request()->routeIs('wbtb.*') ? 'active' : '' }}">
                    <i data-feather="award" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB</span>
                </a>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Wilayah</span>
            </li>
            <li class="menu-item open">
                <a href="{{ route('wilayah.kabkot.index') }}" class="menu-link {{ request()->routeIs('wilayah.kabkot.*') ? 'active' : '' }}">
                    <i data-feather="map" class="menu-icon tf-icons"></i>
                    <span class="title">Kabupaten / Kota</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('wilayah.kecamatan.index') }}" class="menu-link {{ request()->routeIs('wilayah.kecamatan.*') ? 'active' : '' }}">
                    <i data-feather="map" class="menu-icon tf-icons"></i>
                    <span class="title">Kecamatan</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('wilayah.kelurahan.index') }}" class="menu-link {{ request()->routeIs('wilayah.kelurahan.*') ? 'active' : '' }}">
                    <i data-feather="map" class="menu-icon tf-icons"></i>
                    <span class="title">Kelurahan</span>
                </a>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Settings</span>
            </li>
            <li class="menu-item open">
                <a href="{{ route('settings.role.index') }}" class="menu-link {{ request()->routeIs('settings.role.*') ? 'active' : '' }}">
                    <i data-feather="user-check" class="menu-icon tf-icons"></i>
                    <span class="title">Role</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('settings.user.index') }}" class="menu-link {{ request()->routeIs('settings.user.*') ? 'active' : '' }}">
                    <i data-feather="users" class="menu-icon tf-icons"></i>
                    <span class="title">User</span>
                </a>
            </li>
        </ul>
    </aside>
</div>