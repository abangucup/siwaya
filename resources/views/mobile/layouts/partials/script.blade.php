{{-- Scripts From Login Page--}}
<script src="{{ asset('assets/mobile/js/jquery.js') }}"></script>
<script src="{{ asset('assets/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/mobile/js/settings.js') }}"></script>
<script src="{{ asset('assets/mobile/js/custom.js') }}"></script>
{{-- End Scripts --}}


{{-- Upload File --}}
{{-- <script src="{{ asset('assets/mobile/vendor/imageuplodify/imageuploadify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('input[type="file"]').imageuploadify();
    })
</script> --}}

{{-- Home Script --}}
<script src="{{ asset('assets/mobile/js/dz.carousel.js') }}"></script><!-- Swiper -->
<script src="{{ asset('assets/mobile/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- Swiper -->

{{-- <script>
    document.getElementById('animasi-button').addEventListener('click', function() {
        this.classList.add('animate-button');
        setTimeout(function() {
            this.classList.remove('animate-button');
        }.bind(this), 150);
    });
</script> --}}

<script src="assets/vendor/wow/dist/wow.min.js"></script>
<script>
    new WOW().init();
    
    var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset:       50,          // distance to the element when triggering the animation (default is 0)
      mobile:       false       // trigger animations on mobile devices (true is default)
    });
    wow.init();	
</script>



{{-- untuk pjax layouting statis mobile view --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script>
    // Inisialisasi Pjax dengan pengaturan timeout
    $(document).pjax('[data-pjax]', '#pjax-container', {
        timeout: 1000
    });

    // Panggil fungsi updateActiveNavLink() saat Pjax selesai memuat konten
    $(document).on('pjax:end', function () {
        updateActiveNavLink();
    });

    // Panggil fungsi updateActiveNavLink() saat halaman pertama kali dimuat
    $(document).ready(function() {
        updateActiveNavLink();
    });

    // Fungsi untuk mengupdate nav link yang aktif
    function updateActiveNavLink() {
        // Hapus kelas 'active' dari semua link
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
        document.querySelectorAll('.nav-link svg path').forEach(path => path.setAttribute('opacity', '0.4'));
        document.querySelectorAll('.title').forEach(title => title.classList.add('d-none'));

        // Dapatkan path URL saat ini
        let path = window.location.pathname;

        // Tentukan link aktif berdasarkan path
        if (path.includes('mobile/home')) {
            document.getElementById('nav-home').classList.add('active');
            document.getElementById('home-icon').querySelector('path').setAttribute('opacity', '1'); // Set opacity ikon aktif
            document.getElementById('home-title').classList.remove('d-none'); // Tampilkan teks
        } else if (path.includes('mobile/profile')) {
            document.getElementById('nav-profile').classList.add('active');
            document.getElementById('profile-icon').querySelector('path').setAttribute('opacity', '1');
            document.getElementById('profile-title').classList.remove('d-none');
        } else if (path.includes('mobile/wbtb/list')) {
            document.getElementById('nav-listwbtb').classList.add('active');
            document.getElementById('listwbtb-icon').querySelector('path').setAttribute('opacity', '1');
            document.getElementById('listwbtb-title').classList.remove('d-none');
        } else if (path.includes('mobile/wbtb/create') || path.includes('mobile/wbtb/pengajuan')) {
            document.getElementById('nav-submission').classList.add('active');
            document.getElementById('submission-icon').querySelector('path').setAttribute('opacity', '1');
            document.getElementById('submission-title').classList.remove('d-none');
        }
    }
</script>

