{{-- Scripts From Login Page--}}
<script src="{{ asset('assets/mobile/js/jquery.js') }}"></script>
<script src="{{ asset('assets/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/mobile/js/settings.js') }}"></script>
<script src="{{ asset('assets/mobile/js/custom.js') }}"></script>
{{-- End Scripts --}}

{{-- Home Script --}}
<script src="{{ asset('assets/mobile/js/dz.carousel.js') }}"></script><!-- Swiper -->
<script src="{{ asset('assets/mobile/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- Swiper -->

<script>
    document.getElementById('animasi-button').addEventListener('click', function() {
        this.classList.add('animate-button');
        setTimeout(function() {
            this.classList.remove('animate-button');
        }.bind(this), 150);
    });
</script>

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