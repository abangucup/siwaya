@extends('landing.layouts.app')

@section('title', 'Kontak')

@section('content')
<section class="search">
    <div class="container">
        <h4 class="text-center">Alamat</h4>
        <div class="row mt-4">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255335.28149533522!2d122.88709355627753!3d0.5801755998442106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32792d29a463f679%3A0x5016a1d8515104f8!2sDinas%20Pendidikan%2C%20Kebudayaan%2C%20Pemuda%20dan%20Olahraga!5e0!3m2!1sid!2sid!4v1731862410509!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <h6>Dinas Pendidikan, Kebudayaan, Pemuda dan Olahraga</h6>
                <p>
                    <i class="ph-envelope-simple"></i> J32C+FJC, Jl. Brigjen Piola Isa No.1723421, Tinelo Ayula, Kec. Bulango Sel., Kabupaten Bone
                    Bolango, Gorontalo 96125
                </p>
                <p>
                    <i class="ph-phone-bold"></i> 0882-8282-238
                </p>
                <p>
                    <i class="ph-envelope-simple-bold"></i> <a
                        href="mailto:dikbudgorontaloprov@gmail.com">dikbudgorontaloprov@gmail.com</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection