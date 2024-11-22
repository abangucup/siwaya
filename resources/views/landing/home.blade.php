@extends('landing.layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero"
    style="background-image: url('{{ asset('assets/images/banner.png') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10">
                <div class="hero-content" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                    <h1 class="hero-content-title text-white">
                        Warisan Budaya Tak Benda
                    </h1>
                    <p class="hero-content-description text-white">
                        Jadilah bagian dari perlindungan warisan budaya dengan turut mengusulkan warisan budaya tak
                        benda di Bumi Serambi Madinah
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="work-area" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
    <div class="container">
        <div class="row g-3">
            <div class="col-xl-6 col-lg-5">
                <div class="work-area--card">
                    <h3>Mudah & Sederhana Menemukan Warisan Budaya Tak Benda</h3>
                    <p>Pelajari dan jelajahi kekayaan budaya tak benda di Provinsi Gorontalo yang mempesona dan penuh
                        makna.</p>
                    <a class="btn btn-small" href="{{ route('pencatatanWbtb') }}">Lihat warisan budaya tak benda</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="d-grid work-area--service">
                    <div class="work-area--service--items order-2 order-md-1">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 14.375C2.5 7.8125 7.8125 2.5 14.375 2.5" stroke="#1C4456" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M26.2499 14.375C26.2499 20.9375 20.9374 26.25 14.3749 26.25C9.6999 26.25 5.6499 23.55 3.7124 19.6125"
                                stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.5 6.25H25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17.5 10H21.25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M27.5 27.5L25 25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h4>Cari Warisan Budaya Tak Benda</h4>
                    </div>
                    <div class="work-area--service--items order-1 order-md-2">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.2875 17.4999C10.8 16.7874 10.525 15.9249 10.525 14.9999C10.525 12.5249 12.525 10.5249 15 10.5249C17.475 10.5249 19.475 12.5249 19.475 14.9999C19.475 17.4749 17.475 19.4749 15 19.4749"
                                stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M21.95 6.9751C19.8375 5.4751 17.4625 4.6626 15 4.6626C10.5875 4.6626 6.47505 7.2626 3.61255 11.7626C2.48755 13.5251 2.48755 16.4876 3.61255 18.2501C6.47505 22.7501 10.5875 25.3501 15 25.3501C19.4125 25.3501 23.525 22.7501 26.3875 18.2501C27.5125 16.4876 27.5125 13.5251 26.3875 11.7626"
                                stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h4>Catat dan Dokumentasikan Warisan Budaya Tak Benda</h4>

                    </div>
                    <div class="work-area--service--items order-4 order-md-3">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.50011 13.0751C6.26261 13.0751 6.01261 12.9751 5.83761 12.8001C5.57511 12.5251 5.48761 12.1251 5.63761 11.7751L7.96261 6.22509C8.01261 6.11259 8.03761 6.03759 8.07511 5.97509C9.92511 1.71259 12.2876 0.67509 16.4626 2.27509C16.7001 2.36259 16.8876 2.55009 16.9876 2.78759C17.0876 3.02509 17.0876 3.28759 16.9876 3.52509L13.3251 12.0251C13.1751 12.3751 12.8376 12.5876 12.4626 12.5876H8.90011C8.18761 12.5876 7.51261 12.7251 6.86261 13.0001C6.75011 13.0501 6.62511 13.0751 6.50011 13.0751ZM13.2626 3.43759C11.7126 3.43759 10.7626 4.45009 9.77511 6.75009C9.76261 6.78759 9.73761 6.82509 9.72511 6.86259L8.08761 10.7501C8.36261 10.7251 8.62511 10.7126 8.90011 10.7126H11.8376L14.8501 3.71259C14.2626 3.52509 13.7376 3.43759 13.2626 3.43759Z"
                                fill="#1C4456" />
                            <path
                                d="M22.8625 12.8376C22.775 12.8376 22.675 12.8251 22.5875 12.8001C22.1125 12.6626 21.6125 12.5876 21.0875 12.5876H12.4625C12.15 12.5876 11.85 12.4251 11.675 12.1626C11.5125 11.9001 11.475 11.5626 11.6 11.2751L15.225 2.86255C15.4125 2.41255 15.9625 2.10005 16.425 2.26255C16.575 2.31255 16.7125 2.37505 16.8625 2.43755L19.8125 3.67505C21.5375 4.38755 22.6875 5.13755 23.4375 6.03755C23.5875 6.21255 23.7125 6.40005 23.8375 6.60005C23.975 6.81255 24.1 7.06255 24.1875 7.32505C24.225 7.41255 24.2875 7.57505 24.325 7.75005C24.675 8.93755 24.5 10.3876 23.75 12.2626C23.5875 12.6126 23.2375 12.8376 22.8625 12.8376ZM13.8875 10.7126H21.1C21.5 10.7126 21.8875 10.7501 22.275 10.8126C22.625 9.72505 22.7 8.88755 22.5 8.21255C22.475 8.10005 22.45 8.05005 22.4375 8.00005C22.3625 7.80005 22.3125 7.68755 22.25 7.58755C22.1625 7.45005 22.1 7.33755 22 7.22505C21.4625 6.57505 20.5125 5.97505 19.0875 5.38755L16.625 4.36255L13.8875 10.7126Z"
                                fill="#1C4456" />
                            <path
                                d="M19.875 28.4376H10.125C9.775 28.4376 9.45 28.4126 9.125 28.3751C4.7375 28.0876 2.2375 25.5751 1.9375 21.1376C1.9 20.8626 1.875 20.5251 1.875 20.1876V17.7501C1.875 14.9376 3.55 12.4001 6.1375 11.2751C7.025 10.9001 7.95 10.7126 8.9125 10.7126H21.1125C21.825 10.7126 22.5125 10.8126 23.15 11.0126C26.0875 11.9001 28.15 14.6751 28.15 17.7501V20.1876C28.15 20.4626 28.1375 20.7251 28.125 20.9751C27.85 25.8626 25 28.4376 19.875 28.4376ZM8.9 12.5876C8.1875 12.5876 7.5125 12.7251 6.8625 13.0001C4.9625 13.8251 3.7375 15.6876 3.7375 17.7501V20.1876C3.7375 20.4501 3.7625 20.7126 3.7875 20.9626C4.025 24.5251 5.775 26.2751 9.2875 26.5126C9.6 26.5501 9.85 26.5751 10.1125 26.5751H19.8625C23.9875 26.5751 26.0125 24.7626 26.2125 20.8876C26.225 20.6626 26.2375 20.4376 26.2375 20.1876V17.7501C26.2375 15.4876 24.725 13.4626 22.575 12.8001C22.1 12.6626 21.6 12.5876 21.075 12.5876H8.9Z"
                                fill="#1C4456" />
                            <path
                                d="M2.80005 18.6875C2.28755 18.6875 1.86255 18.2625 1.86255 17.75V14.0875C1.86255 10.15 4.65005 6.75 8.50005 6C8.83755 5.9375 9.18755 6.0625 9.41255 6.325C9.62505 6.5875 9.68755 6.9625 9.55005 7.275L7.36255 12.5C7.26255 12.725 7.08755 12.9 6.87505 13C4.97505 13.825 3.75005 15.6875 3.75005 17.75C3.73755 18.2625 3.32505 18.6875 2.80005 18.6875ZM7.00005 8.525C5.40005 9.425 4.23755 11 3.87505 12.8375C4.42505 12.275 5.06255 11.8 5.78755 11.45L7.00005 8.525Z"
                                fill="#1C4456" />
                            <path
                                d="M27.1999 18.6875C26.6874 18.6875 26.2624 18.2625 26.2624 17.75C26.2624 15.4875 24.7499 13.4625 22.5999 12.8C22.3499 12.725 22.1374 12.55 22.0249 12.3125C21.9124 12.075 21.8999 11.8 21.9999 11.5625C22.5874 10.1 22.7374 9.03747 22.4999 8.21247C22.4749 8.09997 22.4499 8.04997 22.4374 7.99997C22.2749 7.63747 22.3624 7.21247 22.6499 6.93747C22.9374 6.66247 23.3749 6.59997 23.7249 6.78747C26.4499 8.21247 28.1374 11.0125 28.1374 14.0875V17.75C28.1374 18.2625 27.7124 18.6875 27.1999 18.6875ZM24.0624 11.3625C24.8499 11.725 25.5499 12.2375 26.1374 12.85C25.8999 11.625 25.3124 10.5125 24.4499 9.63747C24.3874 10.1625 24.2624 10.7375 24.0624 11.3625Z"
                                fill="#1C4456" />
                        </svg>
                        <h4>Tersedia Mobile Apps</h4>

                    </div>
                    <div class="work-area--service--items order-3 order-md-4">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5Z"
                                stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M19.375 12.1875C20.4105 12.1875 21.25 11.348 21.25 10.3125C21.25 9.27697 20.4105 8.4375 19.375 8.4375C18.3395 8.4375 17.5 9.27697 17.5 10.3125C17.5 11.348 18.3395 12.1875 19.375 12.1875Z"
                                stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M10.625 12.1875C11.6605 12.1875 12.5 11.348 12.5 10.3125C12.5 9.27697 11.6605 8.4375 10.625 8.4375C9.58947 8.4375 8.75 9.27697 8.75 10.3125C8.75 11.348 9.58947 12.1875 10.625 12.1875Z"
                                stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M10.5 16.625H19.5C20.125 16.625 20.625 17.125 20.625 17.75C20.625 20.8625 18.1125 23.375 15 23.375C11.8875 23.375 9.375 20.8625 9.375 17.75C9.375 17.125 9.875 16.625 10.5 16.625Z"
                                stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h4>Temukan Warisan Budaya yang berharga</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Counter --}}
<section class="counter" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
    <div class="container">
        <div class="row">

            <div class="col-12 ">
                <div class="counter--container d-flex">
                    <div class="counter--content">
                        <div class="counter--content-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.425 17.5C21.2096 18.8613 20.5686 20.1195 19.5941 21.0941C18.6195 22.0686 17.3613 22.7096 16 22.925"
                                    stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M9 8.17505C7.075 11.075 5.5 14.4001 5.5 17.5001C5.5 20.2848 6.60625 22.9555 8.57538 24.9247C10.5445 26.8938 13.2152 28.0001 16 28.0001C18.7848 28.0001 21.4555 26.8938 23.4246 24.9247C25.3938 22.9555 26.5 20.2848 26.5 17.5001C26.5 11 22 6.00005 18.35 2.36255L14 11.5L9 8.17505Z"
                                    stroke="#417086" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="counter--content-percent">
                            <h2> <span class="counter--content-number">{{ $totalWbtbDitetapkan }}</span></h2>
                        </div>
                        <p class="bold">Warisan yang<br> tervalidasi</p>
                    </div>
                    <div class="counter--content">
                        <div class="counter--content-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.0001 22.6667L17.3334 20.0001V13.1441C19.6281 12.5481 21.3334 10.4774 21.3334 8.00008C21.3334 5.05875 18.9414 2.66675 16.0001 2.66675C13.0587 2.66675 10.6667 5.05875 10.6667 8.00008C10.6667 10.4774 12.3721 12.5481 14.6667 13.1441V20.0001L16.0001 22.6667Z"
                                    fill="#417086" />
                                <path
                                    d="M21.6894 14.0841L20.9787 16.6548C24.4334 17.6094 26.6667 19.4454 26.6667 21.3334C26.6667 23.8561 22.2867 26.6668 16.0001 26.6668C9.71341 26.6668 5.33341 23.8561 5.33341 21.3334C5.33341 19.4454 7.56675 17.6094 11.0227 16.6534L10.3121 14.0828C5.59608 15.3868 2.66675 18.1641 2.66675 21.3334C2.66675 25.8188 8.52408 29.3334 16.0001 29.3334C23.4761 29.3334 29.3334 25.8188 29.3334 21.3334C29.3334 18.1641 26.4041 15.3868 21.6894 14.0841Z"
                                    fill="#417086" />
                            </svg>
                        </div>
                        <div class="counter--content-percent">
                            <h2> <span class="counter--content-number">{{ $totalKabkot }}</span></h2>
                        </div>
                        <p class="bold">Lokasi tempat warisan <br> budaya berada</p>
                    </div>
                    <div class="counter--content">
                        <div class="counter--content-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.425 17.5C21.2096 18.8613 20.5686 20.1195 19.5941 21.0941C18.6195 22.0686 17.3613 22.7096 16 22.925"
                                    stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M9 8.17505C7.075 11.075 5.5 14.4001 5.5 17.5001C5.5 20.2848 6.60625 22.9555 8.57538 24.9247C10.5445 26.8938 13.2152 28.0001 16 28.0001C18.7848 28.0001 21.4555 26.8938 23.4246 24.9247C25.3938 22.9555 26.5 20.2848 26.5 17.5001C26.5 11 22 6.00005 18.35 2.36255L14 11.5L9 8.17505Z"
                                    stroke="#417086" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="counter--content-percent">
                            <h2> <span class="counter--content-number">{{ $totalPengguna }}</span></h2>
                        </div>
                        <p class="bold">Pengguna yang terdaftar <br> dalam sistem</p>
                    </div>
                    <div class="counter--content">
                        <div class="counter--content-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.525 27.475C18.3822 27.8223 17.1944 27.9992 16 28C13.6266 28 11.3066 27.2962 9.33316 25.9776C7.35977 24.6591 5.8217 22.7849 4.91345 20.5922C4.0052 18.3995 3.76756 15.9867 4.23058 13.6589C4.6936 11.3312 5.83649 9.19295 7.51472 7.51472C9.19295 5.83649 11.3312 4.6936 13.6589 4.23058C15.9867 3.76756 18.3995 4.0052 20.5922 4.91345C22.7849 5.8217 24.6591 7.35977 25.9776 9.33316C27.2962 11.3066 28 13.6266 28 16C27.9992 17.1944 27.8223 18.3822 27.475 19.525L19.525 27.475Z"
                                    stroke="#417086" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M21.2 19C20.6714 19.9107 19.9128 20.6667 19.0003 21.1922C18.0877 21.7176 17.0531 21.9942 16 21.9942C14.947 21.9942 13.9124 21.7176 12.9998 21.1922C12.0873 20.6667 11.3287 19.9107 10.8 19"
                                    stroke="#417086" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M20.5 15C21.3284 15 22 14.3284 22 13.5C22 12.6716 21.3284 12 20.5 12C19.6716 12 19 12.6716 19 13.5C19 14.3284 19.6716 15 20.5 15Z"
                                    fill="#417086" />
                                <path
                                    d="M11.5 15C12.3284 15 13 14.3284 13 13.5C13 12.6716 12.3284 12 11.5 12C10.6716 12 10 12.6716 10 13.5C10 14.3284 10.6716 15 11.5 15Z"
                                    fill="#417086" />
                            </svg>
                        </div>
                        <div class="counter--content-percent">
                            <h2><span class="counter--content-number">{{ $totalMasyarakat }}</span></h2>
                        </div>
                        <p class="bold">Kotribusi masyarakat dalam <br> pencatatan warisan budaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Pencatatan Terbaru --}}
<section class="properties" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between properties-header">
                    <h3>Pencatatan Terbaru</h3>
                    <a class="d-md-flex align-items-center d-none" href="{{ route('pencatatanWbtb') }}">
                        <span>Lihat Semua </span>
                        <i class="ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @if ($pencatatanTerbaru->isEmpty())
        <div class="container p-4 mt-2">
            <div class="properties-card">
                <div class="properties-card--content">
                    <div class="d-flex justify-content-center">
                        <div class="error-content-item text-center">
                            <img src="{{ asset('assets/images/no_data.svg') }}" alt="demografis" width="50%">
                            <h4>Data Belum Tersedia</h4>
                            <a class="btn btn-small btn-outline " href="{{ route('home') }}">
                                <span>Halaman Utama</span>
                                <i class="ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="grid row row-cols-xl-3 row-cols-md-2 g-4">
            @foreach ($pencatatanTerbaru as $wbtb)

            <div class="properties-card wilayah resident">
                <div class="properties-card--thumb">
                    <img src="{{ asset($wbtb->galeries()->first()->url_image) }}" alt="{{ $wbtb->nama_wbtb }}">
                </div>
                <div class="properties-card--content ">
                    <div class="properties-card--content--address">
                        <span>{{ $wbtb->nama_wbtb}}</span><br>
                        <span>{{ Str::limit($wbtb->deskripsi_wbtb, 100, '...') }}</span>
                        <span></span>
                        <span class="mt-2 badge bg-info text-white">Dibuat pada: {{
                            \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LLLL') }}</span>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
        @endif

        <div class="row">
            <div class="col-6">
                <a class="btn btn-small btn-outline btn-mobile d-md-none align-items-center d-flex w-auto"
                    href="{{ route('pencatatanWbtb') }}">
                    <span>Lihat Semua </span>
                    <i class="ph-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Penetapan Terbaru --}}
<section class="properties" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between properties-header">
                    <h3>Penetapan Terbaru</h3>
                    <a class="d-md-flex align-items-center d-none" href="{{ route('penetapanWbtb') }}">
                        <span>Lihat Semua </span>
                        <i class="ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @if ($pencatatanTerbaru->isEmpty())
        <div class="container p-4 mt-2">
            <div class="properties-card">
                <div class="properties-card--content">
                    <div class="d-flex justify-content-center">
                        <div class="error-content-item text-center">
                            <img src="{{ asset('assets/images/no_data.svg') }}" alt="demografis" width="50%">
                            <h4>Data Belum Tersedia</h4>
                            <a class="btn btn-small btn-outline " href="{{ route('home') }}">
                                <span>Halaman Utama</span>
                                <i class="ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="grid row row-cols-xl-3 row-cols-md-2 g-4">
            @foreach ($penetapanTerbaru as $wbtb)

            <div class="properties-card industrial wilayah resident">
                <div class="properties-card--thumb">
                    <img src="{{ asset($wbtb->galeries()->first()->url_image) }}" alt="{{ $wbtb->nama_wbtb }}">
                </div>
                <div class="properties-card--content ">
                    <div class="properties-card--content--address">
                        <span>{{ $wbtb->nama_wbtb}}</span><br>
                        <span class="badge bg-secondary text-white mb-2">{{ $wbtb->nomor_wbtb }}</span>
                        <span>{{ Str::limit($wbtb->deskripsi_wbtb, 100, '...') }}</span>
                        <span class="mt-2 badge bg-info text-white">Ditetapkan Tanggal: {{
                            \Carbon\Carbon::parse($wbtb->penetapan->tanggal_penetapan)->isoFormat('LL') }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <a class="btn btn-small btn-outline btn-mobile d-md-none align-items-center d-flex w-auto"
                    href="{{ route('penetapanWbtb') }}">
                    <span>Lihat Semua </span>
                    <i class="ph-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection