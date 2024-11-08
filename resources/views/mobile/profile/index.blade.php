@extends('mobile.layouts.app')

@section('title', 'Profile')

@section('header', 'Profile')

@section('content')

<div class="page-content">
    <div class="author-box">
        <div class="dz-media">
            <img src="{{ auth()->user()->biodata->foto ?? asset('assets/images/profile.png') }}" class="rounded-circle"
                alt="author-image">
        </div>
        <div class="dz-info">
            <h6 class="text-white">{{ auth()->user()->biodata->nama_lengkap }}</h6>
            <span class="fs-6 text-sm">{{ auth()->user()->username }} </span>
        </div>
    </div>
    <ul class="nav navbar-nav">
        <li class="nav-label">Main Menu</li>
        <li><a class="nav-link" href="welcome.html">
                <span class="dz-icon bg-red light">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4"
                            d="M11.776 21.8374C9.49294 20.4273 7.37064 18.7645 5.44791 16.8796C4.09052 15.5338 3.05388 13.8905 2.41718 12.0753C1.27955 8.53523 2.60383 4.48948 6.30113 3.2884C8.25264 2.67553 10.3751 3.05175 12.0071 4.29983C13.6397 3.05315 15.7614 2.67705 17.713 3.2884C21.4103 4.48948 22.7435 8.53523 21.6058 12.0753C20.9743 13.8888 19.9438 15.5319 18.5929 16.8796C16.6684 18.7625 14.5463 20.4251 12.2648 21.8374L12.016 22L11.776 21.8374Z"
                            fill="white" />
                        <path
                            d="M12.0109 22L11.776 21.8374C9.49013 20.4274 7.36487 18.7647 5.43902 16.8796C4.0752 15.5356 3.03238 13.8922 2.39052 12.0753C1.26177 8.53523 2.58605 4.48948 6.28335 3.2884C8.23486 2.67553 10.3853 3.05204 12.0109 4.31057V22Z"
                            fill="white" />
                        <path
                            d="M18.2304 9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z"
                            fill="white" />
                    </svg>
                </span>
                <span>Welcome</span>
            </a></li>
        <li class="sub-menu-down">
            <a class="nav-link" href="javascript:void(0);">
                <span class="dz-icon bg-red light">
                    <svg height="18" viewBox="0 0 512 512" width="18" xmlns="http://www.w3.org/2000/svg">
                        <g id="_40_Sidemenu" data-name="40 Sidemenu">
                            <g fill="#a9defc">
                                <rect height="105.52" rx="24" width="231.61" x="34.56" y="80.54" />
                                <rect height="105.52" rx="24" width="231.61" x="34.56" y="203.24" />
                                <rect height="105.52" rx="24" width="231.61" x="34.56" y="325.94" />
                            </g>
                            <path
                                d="m309.41 501h-274.85a20.46 20.46 0 0 1 0-40.91h254.44v-408.18h-254.44a20.46 20.46 0 0 1 0-40.91h274.85a20.46 20.46 0 0 1 20.46 20.46v449.08a20.46 20.46 0 0 1 -20.46 20.46z"
                                fill="#f5d367" />
                            <path
                                d="m491.92 241.44c-1.43-1.44-74.62-73.44-74.62-73.44a20.46 20.46 0 0 0 -28.93 29l59.55 59.55-59.55 59.55a20.46 20.46 0 0 0 28.93 28.9s73.19-72 74.62-73.41a22 22 0 0 0 0-30.14z"
                                fill="#f5d367" />
                            <path
                                d="m123.85 431.47h-65.29a24 24 0 0 1 -24-24v-57.53a24 24 0 0 1 11.65-20.58 501.22 501.22 0 0 0 77.64 102.11z"
                                fill="#a2d4ea" />
                            <path d="m209.31 501h-174.75a20.46 20.46 0 1 1 0-40.91h120a499.3 499.3 0 0 0 54.75 40.91z"
                                fill="#e2c061" />
                        </g>
                    </svg>
                </span>
                <span>One Level (Mulitilevel)</span>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-down">
                    <a href="javascript:void(0);">Two Level</a>
                    <ul class="sub-menu">
                        <li class="sub-menu-down">
                            <a href="javascript:void(0);">Three Level</a>
                            <ul class="sub-menu">
                                <li><a href="javascript:void(0);">Menu 1</a></li>
                                <li><a href="javascript:void(0);">Menu 2</a></li>
                                <li><a href="javascript:void(0);">Menu 3</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);">Menu 2</a></li>
                        <li><a href="javascript:void(0);">Menu 3</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);">Menu 2</a></li>
                <li><a href="javascript:void(0);">Menu 3</a></li>
            </ul>
        </li>
        <li class="nav-label">Settings</li>
        <li class="nav-color mb-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
            aria-controls="offcanvasBottom">
            <a class="nav-link">
                <span class="dz-icon bg-blue light">
                    <i class="fa-solid fa-palette"></i>
                </span>
                <span>Highlights</span>
            </a>
        </li>
        <li>
            <div class="mode">
                <span class="dz-icon bg-green light">
                    <i class="fa-solid fa-moon"></i>
                </span>
                <span>Dark Mode</span>
                <div class="custom-switch">
                    <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                    <label class="custom-switch-label" for="toggle-dark-menu"></label>
                </div>
            </div>
        </li>
    </ul>
    <div class="sidebar-bottom">
        <h6 class="name">Dinkes App</h6>
        <p>Version 1.0</p>
    </div>
    <!-- Sidebar End -->
</div>

@endsection