@extends('landing.layouts.app')

@section('title', 'Detail WBTB')

@section('content')

<section class="section">
    <h3 class="text-center mb-4">Detail Warisan Budaya - {{ $wbtb->nama_wbtb }}</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="property-details-banner property-details-banner-for">
                    @foreach ($wbtb->galeries as $galeri)
                    <div class="property-details-banner-featured">
                        <a href="{{ $galeri->full_url_image ?? asset('assets/images/siwaya.jpg') }}" class="property-details-banner-link">
                            <img src="{{ $galeri->full_url_image ?? asset('assets/images/siwaya.jpg') }}" alt="properties-banner">
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="property-details-content">
                    <div class="property-details-content-title">
                        <h4>{{ $wbtb->nama_wbtb }}</h4>
                        <p class="bold badge border rounded p-2">Nomor: {{ $wbtb->nomor_wbtb ?? '- ' }}</p>
                    </div>
                    <div class="property-details-content-details">
                        <p class="bold">Deskripsi Lengkap WBTB</p>
                        <p>{{ $wbtb->deskripsi_wbtb }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        Dibuat pada: {{ \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LLLL') }}
                    </div>
                </div>
                <div class="property-details-highlights">
                    <h4>Kondisi Warisan Budaya</h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Kode Kondisi:</strong>
                            <span>{{ $wbtb->kondisi->kode_kondisi ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status:</strong>
                            <span>{{ Str::upper($wbtb->kondisi->nama_kondisi ) ?? '-' }}</span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="property-details-highlights">
                            <h4>Kategori</h4>
                            <ul class="nav nav-tabs property-details-content-local-info-tabs" id="myTab" role="tablist">
                                @foreach ($wbtb->kategoris as $kategori)
                                <li class="nav-item">
                                    <button class="btn btn-primary me-2">{{ $kategori->nama_kategori }}</button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="property-details-highlights">
                            <h4>Sebaran</h4>
                            <ul class="nav nav-tabs property-details-content-local-info-tabs" id="myTab" role="tablist">
                                @foreach ($wbtb->sebarans as $sebaran)
                                <li class="nav-item">
                                    <button class="btn btn-primary me-2">{{ $sebaran->nama_kabkot }}</button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="property-details-highlights">
                    <h4>Status Verifikasi</h4>
                    @if ($wbtb->verifikasi)
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Verifikator:</strong>
                            <span>{{ $wbtb->verifikasi->user->biodata->nama_lengkap ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status Verifikasi:</strong>
                            <span>{{ Str::upper($wbtb->verifikasi->status_verifikasi) ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Catatan:</strong>
                            <span>{{ $wbtb->verifikasi->keterangan ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Tanggal Verifikasi:</strong>
                            <span>{{ \Carbon\Carbon::parse($wbtb->verifikasi->tanggal_verifikasi)->isoFormat('LL') ??
                                '-' }}</span>
                        </li>
                    </ul>
                    @else
                    <div class="text-center">
                        <span class="text-muted">Belum diverifikasi</span>
                    </div>
                    @endif
                </div>
                <div class="property-details-highlights">
                    <h4>Status Penetapan</h4>
                    @if ($wbtb->penetapan)
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Verifikator:</strong>
                            <span>{{ $wbtb->penetapan->user->biodata->nama_lengkap ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status penetapan:</strong>
                            <span>{{ Str::upper($wbtb->penetapan->status_penetapan) ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Catatan:</strong>
                            <span>{{ $wbtb->penetapan->keterangan ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Tanggal Penetapan:</strong>
                            <span>{{ \Carbon\Carbon::parse($wbtb->penetapan->tanggal_penetapan)->isoFormat('LL') ??
                                '-' }}</span>
                        </li>
                    </ul>
                    @else
                    <div class="text-center">
                        <span class="text-muted">Belum Ditetapkan</span>
                    </div>
                    @endif
                </div>
                <div class="property-details-agent">
                    <h4>Detail Penginput Warisan Budaya</h4>
                    <div class="property-details-agent-content d-flex">
                        <div class="property-details-agent-content-thumb">
                            <img src="{{ $wbtb->user->biodata->foto ?? asset('assets/images/siwaya.jpg') }}"
                                alt="agent">
                        </div>
                        <div class="property-details-agent-content-name">
                            <a href="agent-details">
                                <h5>{{ $wbtb->user->biodata->nama_lengkap }}</h5>
                            </a>
                            <div class="property-details-agent-content-contact">
                                <div class="phone d-flex align-items-center">
                                    <i class="ph-phone me-2"></i>
                                    <span>{{ $wbtb->user->biodata->nomor_telepon ?? $wbtb->user->biodata->whatsapp
                                        }}</span>
                                </div>
                                <div class="phone d-flex align-items-center">
                                    <i class="ph ph-map-pin me-2"></i>
                                    <span>{{ $wbtb->user->biodata->alamat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection