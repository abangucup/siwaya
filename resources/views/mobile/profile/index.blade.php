@extends('mobile.layouts.app')

@section('title', 'Profile')

@section('header', 'Profile')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area card shadow-none border p-3">
                <div class="row px-2">
                    <div class="col-12 text-center py-3 mb-4">
                        <img src="{{ auth()->user()->biodata->foto ?? asset('assets/images/profile.svg') }}"
                            class="rounded shadow-none border w-50" alt="{{ auth()->user()->nama_lengkap }}">
                    </div>
                    <div class="col-12 mt-4 mb-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('mobile.profile.show', auth()->user()->biodata->slug) }}"
                                    class="text-dark d-flex justify-content-between align-items-center">Profile
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            {{-- <li class="list-group-item">
                                <a href="{{ route('mobile.wbtb.pengajuan') }}"
                                    class="text-dark d-flex justify-content-between align-items-center">Pengajuan Saya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li> --}}

                            <li class="list-group-item">
                                <a href="{{ route('mobile.profile.edit', auth()->user()->biodata->slug) }}"
                                    class="text-dark d-flex justify-content-between align-items-center">Update Biodata
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('mobile.reset-password') }}"
                                    class="text-dark d-flex justify-content-between align-items-center">Reset Password
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="p-2">

                <h5>Report</h5>
                <div class="row g-3">
                    <div class="col-6 card shadow-none border p-3 w-100">
                        @if (auth()->user()->role->role_level == 'verifikator_provinsi')
                        <div class="border-bottom p-3">
                            <h6>Penetapan Terakhir</h6>
                            <div class="list-group-item">
                                <div class="fs-6 text-dark">{{ $penetapanTerakhir->wbtb->nama_wbtb }}</div> 
                                <div class="border rounded-3 p-1 my-1">{{ $penetapanTerakhir->wbtb->nomor_wbtb }}</div>
                                <div>{{ $penetapanTerakhir ? \Carbon\Carbon::parse($penetapanTerakhir->tanggal_penetapan)->isoFormat('LL') : 'Belum ada' }}</div>
                            </div>
                        </div>
                        <div class="border-bottom p-3">
                            <h6>Telah Ditetapkan</h6>
                            <div class="list-group-item">
                                <div class="fs-5 text-center text-dark">{{ $telahDitetapkan }}</div> 
                            </div>
                        </div>
                        <div class="border-bottom p-3">
                            <h6>Menunggu Penetapan</h6>
                            <div class="list-group-item">
                                <div class="fs-5 text-center text-dark">{{ $menungguPenetapan }}</div> 
                            </div>
                        </div>
                        @elseif (auth()->user()->role->role_level == 'verifikator_kabkot')
                        <div class="border-bottom p-3">
                            <h6>Verifikasi Terakhir</h6>
                            <div class="list-group-item">
                                <span class="fs-6 text-dark">{{ $verifikasiTerakhir->wbtb->nama_wbtb }}</span> <br>
                                <span>{{ $verifikasiTerakhir ? \Carbon\Carbon::parse($verifikasiTerakhir->tanggal_verifikasi )->isoFormat('LL') : 'Belum ada' }}</span>
                            </div>
                        </div>
                        <div class="border-bottom p-3">
                            <h6>Telah Diverifikasi</h6>
                            <div class="list-group-item">
                                <div class="fs-5 text-center text-dark">{{ $telahDiverifikasi }}</div> 
                            </div>
                        </div>
                        <div class="border-bottom p-3">
                            <h6>Menunggu Verifikasi</h6>
                            <div class="list-group-item">
                                <div class="fs-5 text-center text-dark">{{ $menungguVerifikasi }}</div> 
                            </div>
                        </div>
                        @endif
                        <div class="border-bottom p-3">
                            <h6>Pengajuan Terbaru</h6>
                            <div class="list-group-item">
                                <span class="fs-6 text-dark">{{ $pengajuanTerbaru?->nama_wbtb }}</span> <br>
                                <span>{{ $pengajuanTerbaru ? \Carbon\Carbon::parse($pengajuanTerbaru?->created_at)->isoFormat('LLLL') : 'Belum ada' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('mobile.logout') }}" method="post">
                @csrf
                <button type="submit" class="card shadow-none border btn btn-outline-danger btn-block">Logout</button>
            </form>
        </div>
    </div>
</div>

@endsection