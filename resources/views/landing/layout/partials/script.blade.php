<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry">
</script>
<script src="{{ asset('assets/landing/vendor/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/prism/prism.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/isotope/isotope.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/tweenmax/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/counter-up/countup.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/scrollit/scrollit.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendor/magnific-popup/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/landing/js/script.js') }}"></script>

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('login'));
            loginModal.show();
        });
</script>
@endif

<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("eye").className = "ph ph-eye-slash";
        } else {
            x.type = "password";
            document.getElementById("eye").className = "ph ph-eye";
        }
    }
</script>