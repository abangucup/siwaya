@extends('mobile.layouts.app')

@section('title', 'List')

@section('header', 'List WBTB')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area">
                <div class="sticky-top bg-white" style="top: 60px">
                    <form action="{{ route('mobile.wbtb.list') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari WBTB" name="search"
                                value="{{ request()->query('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
                @forelse ($dataWbtb as $wbtb)
                <div class="col-12">
                    <div class="card border shadow-sm">
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
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/images/no_data.svg') }}" alt="" width="50%">
                            <p class="card-text fs-5">
                                Data Tidak Ditemukan
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