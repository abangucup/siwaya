@extends('mobile.layouts.app')

@section('title', 'Verifkasi')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Verifikasi WBTB')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area">
                @forelse ($wbtbDiajukan as $wbtb)
                <div class="col-12">
                    <div class="card border shadow-none">
                        <img src="{{ $wbtb->galeries->first()->url_image ?? asset('assets/images/no_image.svg') }}"
                            class="card-img-top" alt="{{ $wbtb->nama_wbtb }}" style="object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $wbtb->nama_wbtb }}</h5>

                            <p class="card-text">
                                {{ Str::limit($wbtb->deskripsi_wbtb, 150) }} 
                                <br><a href="{{ route('mobile.wbtb.show', $wbtb->slug) }}"
                                    class="">Lihat Selengkapnya ..</a>
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <span class="badge light badge-sm badge-{{ $wbtb->status == 'diverifikasi' ? 'info' : ($wbtb->status == 'ditetapkan' ? 'success' : 'danger')  }} me-1 mb-1">{{ \Str::upper($wbtb->status) }}</span>
                            <span class="float-end">{{ \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LL') }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card border shadow-none">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/images/no_data.svg') }}" alt="" width="50%">
                            <p class="card-text fs-6 mt-4">
                                Belum ada data baru
                            </p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection