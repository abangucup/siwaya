@extends('landing.layouts.app')

@section('title', 'Pencatatan WBTB')

@section('content')
<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-11 col-xl-8 mx-auto">
                <div class="search-content">
                    <h3 class="text-center mb-4">Pencatatan Warisan Budaya Tak Benda</h3>
                    <form action="{{ route('pencatatanWbtb') }}" method="get">
                        <div class="input-group search-form">
                            <input type="text" class="form-control" name="search" placeholder="Cari Warisan Budaya Tak Benda">
                            <button type="submit" class="input-group-text"><i class="ph-magnifying-glass-bold"></i></button>
                        </div>  
                    </form>
                    <div class="search-result">
                        @forelse ($wbtbs as $wbtb)
                        @if (request()->query('search'))
                        <h6>Kata Kunci: {{ request()->query('search') }}</h6>
                        @endif
                        <div class="search-result-item">
                            <a href="{{ route('detailWbtb', $wbtb->slug) }}">{{ $wbtb->nama_wbtb }}</a>
                            <p class="mb-4">{{ Str::limit($wbtb->deskripsi_wbtb, 200, '...') }}</p>
                            <span class="rounded border border-gray px-4 py-2">{{ \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LLLL') }}</span>
                        </div>

                        @empty
                        <div class="search-result-item">
                            <span class="fs-5">Belum ada pengajuan/pencatatan terbaru</span>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection