<!-- Menubar -->

<div class="menubar-area">
    <div class="toolbar-inner menubar-nav">
        <a href="{{ route('mobile.home') }}" class="nav-link" id="nav-home" data-pjax>
            <svg id="home-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M20.479 7.57827L15.093 3.12502C13.2787 1.62499 10.7213 1.62499 8.90703 3.12502L3.52097 7.57827C2.55059 8.38059 2 9.59706 2 10.8663V18.8739C2 20.5419 3.28643 22 5 22H7C8.65685 22 10 20.6569 10 19V15.6848C10 15.0044 10.5044 14.5587 11 14.5587H13C13.4956 14.5587 14 15.0044 14 15.6848V19C14 20.6569 15.3431 22 17 22H19C20.7136 22 22 20.5419 22 18.8739V10.8663C22 9.59706 21.4494 8.38059 20.479 7.57827Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span id="home-title" class="title mt-0 d-none">Home</span>
        </a>

        <a href="{{ route('mobile.wbtb.list') }}" class="nav-link" id="nav-listwbtb" data-pjax>
            <svg id="listwbtb-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.3517 7.61665L15.3929 4.05375C14.2651 3.03868 13.7012 2.53114 13.0092 2.26562L13 5.00011C13 7.35713 13 8.53564 13.7322 9.26787C14.4645 10.0001 15.643 10.0001 18 10.0001H21.5801C21.2175 9.29588 20.5684 8.71164 19.3517 7.61665Z"
                    fill="#1C274C" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V13.5629C22 12.6901 22 12.0344 21.9574 11.5001H18L17.9051 11.5001C16.808 11.5002 15.8385 11.5003 15.0569 11.3952C14.2098 11.2813 13.3628 11.0198 12.6716 10.3285C11.9803 9.63726 11.7188 8.79028 11.6049 7.94316C11.4998 7.16164 11.4999 6.19207 11.5 5.09497L11.5092 2.26057C11.5095 2.17813 11.5166 2.09659 11.53 2.01666C11.1214 2 10.6358 2 10.0298 2C6.23869 2 4.34315 2 3.17157 3.17157C2 4.34315 2 6.22876 2 10V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22ZM9.01296 12.9528C8.72446 12.6824 8.27554 12.6824 7.98704 12.9528L5.98704 14.8278C5.68486 15.1111 5.66955 15.5858 5.95285 15.888C6.23614 16.1901 6.71077 16.2055 7.01296 15.9222L7.75 15.2312L7.75 18.5C7.75 18.9142 8.08579 19.25 8.5 19.25C8.91421 19.25 9.25 18.9142 9.25 18.5L9.25 15.2312L9.98704 15.9222C10.2892 16.2055 10.7639 16.1901 11.0472 15.888C11.3305 15.5858 11.3151 15.1111 11.013 14.8278L9.01296 12.9528Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span class="title mt-0 d-none" id="listwbtb-title">WBTB</span>
        </a>

        {{-- VERIFIKATOR KABKOT --}}
        @if (auth()->user()->role->role_level == 'verifikator_kabkot')
        <a href="{{ route('mobile.wbtb.verifikasi') }}" class="nav-link" id="nav-verifikasi" data-pjax>
            <svg id="verifikasi-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.3517 7.61665L15.3929 4.05375C14.2651 3.03868 13.7012 2.53114 13.0092 2.26562L13 5.00011C13 7.35713 13 8.53564 13.7322 9.26787C14.4645 10.0001 15.643 10.0001 18 10.0001H21.5801C21.2175 9.29588 20.5684 8.71164 19.3517 7.61665Z"
                    fill="#1C274C" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V13.5629C22 12.6901 22 12.0344 21.9574 11.5001H18L17.9051 11.5001C16.808 11.5002 15.8385 11.5003 15.0569 11.3952C14.2098 11.2813 13.3628 11.0198 12.6716 10.3285C11.9803 9.63726 11.7188 8.79028 11.6049 7.94316C11.4998 7.16164 11.4999 6.19207 11.5 5.09497L11.5092 2.26057C11.5095 2.17813 11.5166 2.09659 11.53 2.01666C11.1214 2 10.6358 2 10.0298 2C6.23869 2 4.34315 2 3.17157 3.17157C2 4.34315 2 6.22876 2 10V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22ZM9.01296 12.9528C8.72446 12.6824 8.27554 12.6824 7.98704 12.9528L5.98704 14.8278C5.68486 15.1111 5.66955 15.5858 5.95285 15.888C6.23614 16.1901 6.71077 16.2055 7.01296 15.9222L7.75 15.2312L7.75 18.5C7.75 18.9142 8.08579 19.25 8.5 19.25C8.91421 19.25 9.25 18.9142 9.25 18.5L9.25 15.2312L9.98704 15.9222C10.2892 16.2055 10.7639 16.1901 11.0472 15.888C11.3305 15.5858 11.3151 15.1111 11.013 14.8278L9.01296 12.9528Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span class="title mt-0 d-none" id="verifikasi-title">Verifikasi</span>
        </a>

        {{-- VERIFIKATOR PROVINSI --}}
        @elseif (auth()->user()->role->role_level == 'verifikator_provinsi')
        <a href="{{ route('mobile.wbtb.penetapan') }}" class="nav-link" id="nav-penetapan" data-pjax>
            <svg id="penetapan-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.3517 7.61665L15.3929 4.05375C14.2651 3.03868 13.7012 2.53114 13.0092 2.26562L13 5.00011C13 7.35713 13 8.53564 13.7322 9.26787C14.4645 10.0001 15.643 10.0001 18 10.0001H21.5801C21.2175 9.29588 20.5684 8.71164 19.3517 7.61665Z"
                    fill="#1C274C" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V13.5629C22 12.6901 22 12.0344 21.9574 11.5001H18L17.9051 11.5001C16.808 11.5002 15.8385 11.5003 15.0569 11.3952C14.2098 11.2813 13.3628 11.0198 12.6716 10.3285C11.9803 9.63726 11.7188 8.79028 11.6049 7.94316C11.4998 7.16164 11.4999 6.19207 11.5 5.09497L11.5092 2.26057C11.5095 2.17813 11.5166 2.09659 11.53 2.01666C11.1214 2 10.6358 2 10.0298 2C6.23869 2 4.34315 2 3.17157 3.17157C2 4.34315 2 6.22876 2 10V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22ZM9.01296 12.9528C8.72446 12.6824 8.27554 12.6824 7.98704 12.9528L5.98704 14.8278C5.68486 15.1111 5.66955 15.5858 5.95285 15.888C6.23614 16.1901 6.71077 16.2055 7.01296 15.9222L7.75 15.2312L7.75 18.5C7.75 18.9142 8.08579 19.25 8.5 19.25C8.91421 19.25 9.25 18.9142 9.25 18.5L9.25 15.2312L9.98704 15.9222C10.2892 16.2055 10.7639 16.1901 11.0472 15.888C11.3305 15.5858 11.3151 15.1111 11.013 14.8278L9.01296 12.9528Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span class="title mt-0 d-none" id="penetapan-title">Penetapan</span>
        </a>
        
        @elseif (auth()->user()->role->role_level == 'masyarakat') {{-- masyarakat --}}
        <a href="{{ route('mobile.wbtb.pengajuan') }}" class="nav-link" id="nav-submission" data-pjax>
            <svg id="submission-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.3517 7.61665L15.3929 4.05375C14.2651 3.03868 13.7012 2.53114 13.0092 2.26562L13 5.00011C13 7.35713 13 8.53564 13.7322 9.26787C14.4645 10.0001 15.643 10.0001 18 10.0001H21.5801C21.2175 9.29588 20.5684 8.71164 19.3517 7.61665Z"
                    fill="#1C274C" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V13.5629C22 12.6901 22 12.0344 21.9574 11.5001H18L17.9051 11.5001C16.808 11.5002 15.8385 11.5003 15.0569 11.3952C14.2098 11.2813 13.3628 11.0198 12.6716 10.3285C11.9803 9.63726 11.7188 8.79028 11.6049 7.94316C11.4998 7.16164 11.4999 6.19207 11.5 5.09497L11.5092 2.26057C11.5095 2.17813 11.5166 2.09659 11.53 2.01666C11.1214 2 10.6358 2 10.0298 2C6.23869 2 4.34315 2 3.17157 3.17157C2 4.34315 2 6.22876 2 10V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22ZM9.01296 12.9528C8.72446 12.6824 8.27554 12.6824 7.98704 12.9528L5.98704 14.8278C5.68486 15.1111 5.66955 15.5858 5.95285 15.888C6.23614 16.1901 6.71077 16.2055 7.01296 15.9222L7.75 15.2312L7.75 18.5C7.75 18.9142 8.08579 19.25 8.5 19.25C8.91421 19.25 9.25 18.9142 9.25 18.5L9.25 15.2312L9.98704 15.9222C10.2892 16.2055 10.7639 16.1901 11.0472 15.888C11.3305 15.5858 11.3151 15.1111 11.013 14.8278L9.01296 12.9528Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span class="title mt-0 d-none" id="submission-title">Pengajuan</span>
        </a>
        @endif
        
        <a href="{{ route('mobile.profile.index') }}" class="nav-link" id="nav-profile" data-pjax>
            <svg id="profile-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4.6138 8.54479L4.1875 10.25H2C1.58579 10.25 1.25 10.5858 1.25 11C1.25 11.4142 1.58579 11.75 2 11.75H22C22.4142 11.75 22.75 11.4142 22.75 11C22.75 10.5858 22.4142 10.25 22 10.25H19.8125L19.3862 8.54479C18.8405 6.36211 18.5677 5.27077 17.7539 4.63538C16.9401 4 15.8152 4 13.5653 4H10.4347C8.1848 4 7.05988 4 6.24609 4.63538C5.43231 5.27077 5.15947 6.36211 4.6138 8.54479ZM6.5 21C8.12316 21 9.48826 19.8951 9.88417 18.3963L10.9938 17.8415C11.6272 17.5248 12.3728 17.5248 13.0062 17.8415L14.1158 18.3963C14.5117 19.8951 15.8768 21 17.5 21C19.433 21 21 19.433 21 17.5C21 15.567 19.433 14 17.5 14C15.8399 14 14.4498 15.1558 14.0903 16.7065L13.6771 16.4999C12.6213 15.972 11.3787 15.972 10.3229 16.4999L9.90967 16.7065C9.55023 15.1558 8.16009 14 6.5 14C4.567 14 3 15.567 3 17.5C3 19.433 4.567 21 6.5 21Z"
                    fill="#808080" opacity="0.1" />
            </svg>
            <span class="title mt-0 d-none" id="profile-title">Profile</span>
        </a>
    </div>
</div>
<!-- Menubar -->