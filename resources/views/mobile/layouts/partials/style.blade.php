<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/siwaya.png') }}" />
<link rel="icon" type="image/png" href="{{ asset('assets/images/siwaya.png') }}">


<!-- Stylesheets -->
<link rel="stylesheet" href="{{ asset('assets/mobile/vendor/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/mobile/css/style.css') }}">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{--
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Racing+Sans+One&display=swap"
    rel="stylesheet"> --}}
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('assets/mobile/vendor/imageuplodify/imageuploadify.min.css') }}" rel="stylesheet">


<style>
    /* pengaturan banner */
    .banner-wrapper {
        padding: 20px 0 20px;
    }

    /* end banner */
    .animate-button {
        animation: button-animasi 0.5s ease-in-out;
    }

    @keyframes button-animasi {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
        }
    }
</style>

{{-- mengatur spasi antar menubar --}}
<style>
    .menubar-area .toolbar-inner {
        display: flex;
        justify-content: space-around;
        /* Membagi elemen secara rata */
    }

    .menubar-area .toolbar-inner .nav-link,
    .menubar-area .toolbar-inner .menu-toggler {
        color: var(--title);
        text-align: center;
        flex: 1;
        /* Mengatur setiap item agar memiliki lebar sama */
        padding: 0;
        font-size: 18px;
    }

</style>