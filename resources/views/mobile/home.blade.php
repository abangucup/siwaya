@extends('mobile.layouts.app')

@section('title', 'Home')


@section('content')

<!-- Banner -->
<div class="banner-wrapper">
    <div class="container inner-wrapper text-center">
        <div class="dz-info">
            <span class="fs-5 text-white">Selamat Datang !!!</span>
            <h2 class="name mb-0">{{ auth()->user()->biodata->nama_lengkap }}</h2>
        </div>
    </div>
</div>
<!-- Banner End -->

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">
            <div class="dashboard-area">

                <div class="features-box">
                    <div class="row mb-3 g-3">
                        @foreach ($data as $key => $value)
                        <div class="col-6">
                            <div class="card bg-info text-white">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h4 class="card-title text-white">{{ $value}}</h4>
                                    <p class="card-text">{{ $key }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                {{-- Penetapan Terbaru --}}
                <div class="title-bar">
                    <h5 class="dz-title">PENETAPAN TERBARU WBTB</h5>
                    <a class="btn btn-sm text-primary" href="{{ route('mobile.wbtb.list') }}">LAINNYA</a>
                </div>
                <div class="list item-list recent-jobs-list">
                    <ul>    
                        @forelse ($wbtbDitetapkan as $wbtb)
                        <li>
                            <a href="{{ route('mobile.wbtb.show', $wbtb->slug) }}" class="item-media">
                                <img src="{{ $wbtb->galeries()->first()->url_image ?? asset('assets/images/no_image.svg') }}"
                                    alt="Gambar" style="object-fit: cover;" class="img-fluid w-100">
                            </a>
                            <div class="item-content">
                                <div class="item-inner">
                                    <h6 class="item-title mt-2"><a href="job-detail.html">{{ $wbtb->nama_wbtb }}</a></h6>
                                    <div class="item-title-row">
                                        <div class="item-subtitle">
                                            {{ \Carbon\Carbon::parse($wbtb->penetapan->tanggal_penetapan ?? $wbtb->created_at)->isoFormat('LL') }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="item-price">{{ Str::limit($wbtb->deskripsi_wbtb, 100, '...') }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="item-price">{{ $wbtb->penetapan->user->biodata->nama_lengkap ?? $wbtb->user->biodata->nama_lengkap }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="sortable-handler"></div>
                        </li>
                        @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/no_data.svg') }}" alt="" width="50%">
                                    <p class="card-text fs-5">
                                        Belum ada data yang ditetapkan
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </ul>
                </div>

                {{-- Verifikasi Terbaru --}}
                <div class="title-bar">
                    <h5 class="dz-title">VERIFIKASI TERBARU WBTB</h5>
                    <a class="btn btn-sm text-primary" href="{{ route('mobile.wbtb.list') }}">LAINNYA</a>
                </div>
                <div class="list item-list recent-jobs-list">
                    <ul>    
                        @forelse ($wbtbDitetapkan as $wbtb)
                        <li>
                            <a href="{{ route('mobile.wbtb.show', $wbtb->slug) }}" class="item-media">
                                <img src="{{ $wbtb->galeries()->first()->url_image ?? asset('assets/images/no_image.svg') }}"
                                    alt="Gambar" style="object-fit: cover;" class="img-fluid w-100">
                            </a>
                            <div class="item-content">
                                <div class="item-inner">
                                    <h6 class="item-title mt-2"><a href="job-detail.html">{{ $wbtb->nama_wbtb }}</a></h6>
                                    <div class="item-title-row">
                                        <div class="item-subtitle">
                                            {{ \Carbon\Carbon::parse($wbtb->verifikasi->tanggal_verifikasi ?? $wbtb->created_at)->isoFormat('LL') }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="item-price">{{ Str::limit($wbtb->deskripsi_wbtb, 100, '...') }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="item-price">{{ $wbtb->verifikasi->user->biodata->nama_lengkap ?? $wbtb->user->biodata->nama_lengkap }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="sortable-handler"></div>
                        </li>
                        @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/no_data.svg') }}" alt="" width="50%">
                                    <p class="card-text fs-5">
                                        Belum ada data yang ditetapkan
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection