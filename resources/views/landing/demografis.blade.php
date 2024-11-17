@extends('landing.layouts.app')

@section('title', 'Demografis')

@section('content')
@if ($demografis->isEmpty())
<section class="section">
    <div class="container">
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
</section>
@else
{{-- <div id="map" style="height: 600px;"></div> --}}
<section class="search">
    <div class="container">
        <h3 class="text-center mb-4">Demografis WBTB Provinsi Gorontalo</h3>
        <div id="map" style="height: 600px;"></div>
    </div>
</section>
@endif
@endsection

@push('script')
<!-- Tambahkan Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Data dari Controller
    const locations = @json($demografis);

    // Inisialisasi Peta
    const map = L.map('map').setView([0.6, 122.9], 9); // Koordinat pusat Gorontalo

    // Tambahkan Tile Layer (peta dasar)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© Siwaya App'
    }).addTo(map);

    // Tambahkan Marker untuk setiap lokasi
    locations.forEach(location => {
        if (location.latitude && location.longitude) {
            // Angka Total Data WBTB langsung terlihat di marker
            const marker = L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindTooltip(`${location.total || '0'}`, { // Tampilkan totalDataWbtb di atas marker
                    permanent: true,
                    direction: 'center',
                    className: 'total-data-tooltip' // Tambahkan CSS untuk tampilan tooltip
                });

            // Pop-up detail muncul ketika marker diklik
            marker.bindPopup(`
                <b>ID:</b> ${location.id}<br>
                <b>Nama:</b> ${location.name}<br>
                <b>Latitude:</b> ${location.latitude}<br>
                <b>Longitude:</b> ${location.longitude}<br>
                <b>Total Data WBTB:</b> ${location.total || '0'}<br>
            `);
        }
    });
</script>
@endpush