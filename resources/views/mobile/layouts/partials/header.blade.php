@if (request()->is('*/home'))
<header class="header transparent">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    <div class="author-box">
                        <div class="dz-media">
                            <div style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%; background-color: #f8f9fa;">
                                <img src="{{ auth()->user()->biodata->foto ?? asset('assets/images/altPhoto.png') }}" 
                                     alt="author-image" 
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mid-content">
                </div>
                <div class="right-content">
                    <a href="javascript:void(0);" class="theme-btn">
                        <svg class="dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                        <svg class="light" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
@else
<header class="header">
    <div class="main-bar">
        <div class="container">
            <div class="header-content">
                <div class="left-content">
                    @yield('btn-back')
                </div>
                <div class="mid-content">
                    <h5 class="mb-0">@yield('header')</h5>
                </div>
            </div>
        </div>
    </div>
</header>
@endif