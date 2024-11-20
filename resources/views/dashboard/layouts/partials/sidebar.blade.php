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

            @if (auth()->user()->role->role_level == 'operator_provinsi')
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

            @elseif (auth()->user()->role->role_level == 'operator_kabkot')
            <li class="menu-item open">
                <a href="{{ route('wbtb.index') }}" class="menu-link {{ request()->routeIs('wbtb.*') ? 'active' : '' }}">
                    <i data-feather="award" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB</span>
                </a>
            </li>
            @endif
            
            {{-- <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Laporan</span>
            </li>
            <li class="menu-item open">
                <a href="{{ route('laporan.diajukan') }}" class="menu-link {{ request()->routeIs('laporan.diajukan*') ? 'active' : '' }}">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB Diajukan</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('laporan.diverifikasi') }}" class="menu-link {{ request()->routeIs('laporan.diverifikasi*') ? 'active' : '' }}">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB Diverifikasi</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('laporan.ditetapkan') }}" class="menu-link {{ request()->routeIs('laporan.ditetapkan*') ? 'active' : '' }}">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB Ditetapkan</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('laporan.ditolak') }}" class="menu-link {{ request()->routeIs('laporan.ditolak*') ? 'active' : '' }}">
                    <i data-feather="file-text" class="menu-icon tf-icons"></i>
                    <span class="title">WBTB Ditolak</span>
                </a>
            </li> --}}

        </ul>
    </aside>
</div>