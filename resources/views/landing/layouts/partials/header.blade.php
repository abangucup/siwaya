<header>
        <nav class="navbar navbar-expand-lg navbar-white" id="navigationBar">
            <div class="container-fluid navbar-container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo_provinsi.png') }}" alt="logo" width="165px" height="45px">
                    </a>
                </div>
                <div class=" d-none d-sm-flex navbar-search align-items-center ms-auto ms-lg-0 order-lg-last">
                    <a class="btn btn-small btn-outline d-none d-lg-inline-block" data-bs-toggle="modal"
                        href="{{ route('home') }}#login" role="button">Log In</a>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="open ">
                        <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1" y1="14.4004" x2="23" y2="14.4004" stroke="#1C4456" stroke-width="2"
                                stroke-linecap="round" />
                            <line x1="1" y1="8.40039" x2="23" y2="8.40039" stroke="#1C4456" stroke-width="2"
                                stroke-linecap="round" />
                            <line x1="1" y1="1.2002" x2="23" y2="1.2002" stroke="#1C4456" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        Menu
                    </span>
                    <span class="close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10" />
                            <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Close
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}" style="{{ request()->is('/') ? 'border-bottom: 2px solid;' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('demografis') ? 'active' : '' }}" href="{{ route('demografis') }}" style="{{ request()->is('demografis') ? 'border-bottom: 2px solid;' : '' }}">
                                Demografis
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('home') }}#" data-bs-toggle="dropdown" style="{{ request()->is('pencatatan-wbtb') || request()->is('penetapan-wbtb') ? 'border-bottom: 2px solid;' : '' }}">
                                Warisan Budaya
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('pencatatanWbtb') }}">Pencatatan</a></li>
                                <li><a class="dropdown-item" href="{{ route('penetapanWbtb') }}">Penetapan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}" style="{{ request()->is('kontak') ? 'border-bottom: 2px solid;' : '' }}">
                                Kontak
                            </a>
                        </li>
                        <li class="nav-item d-none">
                        </li>
                    </ul>
                    <div class="d-flex navbar-search align-items-center ms-auto ms-lg-0 order-lg-last d-sm-none">
                        @auth
                            <a class="btn btn-small btn-outline" href="{{ route('dashboard') }}"
                                role="button">Dashboard</a>
                        @else
                            <a class="btn btn-small btn-outline" data-bs-toggle="modal" href="{{ route('home') }}#login"
                                role="button">Log In</a>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>
    </header>