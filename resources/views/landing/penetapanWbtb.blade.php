@extends('landing.layouts.app')

@section('title', 'Penetapan WBTB')

@section('content')
<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-11 col-xl-8 mx-auto">
                <div class="search-content">
                    <h3 class="text-center mb-4">Penetapan Warisan Budaya Tak Benda</h3>
                    <form action="{{ route('penetapanWbtb') }}" method="get">
                        <div class="input-group search-form">
                            <input type="text" class="form-control" name="search"
                                placeholder="Cari Warisan Budaya Tak Benda">
                            <button type="submit" class="input-group-text"><i
                                    class="ph-magnifying-glass-bold"></i></button>
                        </div>
                    </form>
                    <div class="search-result">

                        @if (request()->query('search'))
                        <h6>Kata Kunci: {{ request()->query('search') }}</h6>
                        @endif

                        @forelse ($wbtbs as $wbtb)

                        <div class="search-result-item d-flex">
                            <img src="{{ $wbtb->galeries()->first()->url_image ?? asset('assets/images/no_image.svg') }}"
                                width="120" class="img-thumbnail" alt="Gambar">
                            <div class="ms-4">
                                <a href="">{{ $wbtb->nama_wbtb }}</a>
                                <p class="mb-3">{{ Str::limit($wbtb->deskripsi_wbtb, 200, '...') }}</p>
                                <span class="rounded border border-gray px-4 py-1">{{
                                    \Carbon\Carbon::parse($wbtb->penetapan->tanggal_penetapan)->isoFormat('LL') .' |
                                    '.$wbtb->penetapan->user->biodata->nama_lengkap }}</span>
                            </div>
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