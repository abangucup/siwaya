@extends('mobile.layouts.app')

@section('title', 'Pengajuan')

@section('btn-back')
<a href="javascript:void(0);" class="back-btn">
    <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
            fill="#a19fa8" />
    </svg>
</a>
@endsection

@section('header', 'Detail WBTB')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area">
                <div class="row">
                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($wbtb->galeries as $key => $gallery)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ $gallery->url_image }}" class="d-block w-100"
                                            alt="{{ $gallery->keterangan }}">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="card-body">
                                @if ($wbtb->nomor_wbtb)
                                <div class="d-flex justify-content-center mb-4">
                                    <span class="fs-6 text-center text-primary border border-primary rounded-3 w-100">{{
                                        $wbtb->nomor_wbtb }}</span>
                                </div>
                                @endif
                                <h5 class="card-title">{{ $wbtb->nama_wbtb }}</h5>
                                <p class="card-text">{!! $wbtb->deskripsi_wbtb !!}</p>
                                {{-- @if (auth()->user()->slug !== $wbtb->user->slug)
                                <span class="text-primary"><u>#{!! $wbtb->deskripsi_wbtb !!}</u></span>
                                @endif --}}
                                <span class="text-grey border border-gray rounded-3 p-2">{{ \Carbon\Carbon::parse($wbtb->created_at)->isoFormat('LL') }}</span>

                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">Kategori
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#kategoriDetails" aria-expanded="false"
                                        aria-controls="kategoriDetails"></i>
                                </h5>
                                <ul id="kategoriDetails" class="list-group list-group-flush collapse">
                                    @foreach ($wbtb->kategoris as $kategori)
                                    <li class="my-2">
                                        <span class="badge bg-info">{{ $kategori->nama_kategori }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center shadow-none">Kondisi
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#kondisiDetails" aria-expanded="false"
                                        aria-controls="kondisiDetails"></i>
                                </h5>
                                <ul class="list-group list-group-flush collapse" id="kondisiDetails">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Kode : </strong>
                                        <span class="text-end">{{ $wbtb->kondisi->kode_kondisi ?? '-' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Kondisi : </strong>
                                        <span class="text-end">{{ $wbtb->kondisi->nama_kondisi ?? '-' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">
                                    Sebaran
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#sebaranDetails" aria-expanded="false"
                                        aria-controls="sebaranDetails"></i>
                                </h5>
                                <ul id="sebaranDetails" class="list-group list-group-flush collapse">
                                    @foreach ($wbtb->kategoris as $kategori)
                                    <li class="my-2">
                                        <span class="badge bg-info">{{ $kategori->nama_kategori }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- PEMBUAT --}}
                    @if (auth()->user()->slug !== $wbtb->user->slug)
                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">
                                    Pembuat
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#pembuatDetails" aria-expanded="false"
                                        aria-controls="pembuatDetails"></i>
                                </h5>
                                <ul id="pembuatDetails" class="list-group list-group-flush collapse">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Nama Lengkap : </strong> {{ $wbtb->user->biodata->nama_lengkap }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Jenis Kelamin : </strong> {{ $wbtb->user->biodata->jenis_kelamin == 'L'
                                        ? 'Laki-Laki' : 'Perempuan' }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Tanggal Lahir : </strong> {{
                                        \Carbon\Carbon::parse($wbtb->user->biodata->tanggal_lahir)->isoFormat('LL') }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Alamat : </strong> {{ $wbtb->user->biodata->alamat }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>No. HP : </strong> {{ $wbtb->user->biodata->no_hp }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Whatsapp : </strong> {{ $wbtb->user->biodata->whatsapp }}
                                    </li>
                                    @if ($wbtb->user->biodata->user->instansi != null)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Instansi : </strong> {{ $wbtb->user->biodata->user->instansi->instansi
                                        }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- HISTORY VERIFIKASI --}}
                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">History Verifikasi
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#verifikasiDetails" aria-expanded="false"
                                        aria-controls="verifikasiDetails"></i>
                                </h5>
                                <ul class="list-group list-group-flush collapse" id="verifikasiDetails">
                                    @if ($wbtb->verifikasi !== null)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Verifikator : </strong>
                                        <span class="text-end">{{ $wbtb->verifikasi->user->biodata->nama_lengkap ?? '-'
                                            }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status Verifikasi : </strong>
                                        <span class="text-end">{{ $wbtb->verifikasi->status_verifikasi ?? '-' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Catatan : </strong>
                                        <span class="text-end">{{ $wbtb->verifikasi->keterangan ?? '-' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Tanggal Verifikasi : </strong>
                                        <span class="text-end">{{ $wbtb->verifikasi->tanggal_verifikasi ?? '-' }}</span>
                                    </li>
                                    @elseif (auth()->user()->role->role_level == 'verifikator_kabkot' && $wbtb->status == 'diajukan' && $wbtb->verifikasi == null)
                                    <button class="btn btn-info w-100 mt-2">Verifikasi</button>
                                    @else
                                    <div class="d-flex justify-content-center mt-4">
                                        <span class="fs-6 text-center text-primary border border-gray rounded-3 w-100">Menunggu Verifikasi</span>
                                    </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- HISTORY PENETAPAN --}}
                    <div class="col-12">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between align-items-center">History Penetapan
                                    <i class="fas fa-chevron-down float-end toggle-icon" data-bs-toggle="collapse"
                                        data-bs-target="#penetapanDetails" aria-expanded="false"
                                        aria-controls="penetapanDetails"></i>
                                </h5>
                                <ul class="list-group list-group-flush collapse" id="penetapanDetails">
                                    @if ($wbtb->penetapan !== null)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Penetap : </strong>
                                        <span class="text-end">{{ $wbtb->penetapan->user->biodata->nama_lengkap ?? '-'
                                            }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Status Penetapan : </strong>
                                        <span class="text-end">{{ $wbtb->penetapan->status_penetapan ?? '-' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Catatan : </strong>
                                        <span class="text-end">{{ $wbtb->penetapan->keterangan ?? '-' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <strong>Tanggal Penetapan : </strong>
                                        <span class="text-end">{{ $wbtb->penetapan->tanggal_penetapan ?? '-' }}</span>
                                    </li>
                                    @elseif ($wbtb->penetapan == null && $wbtb->status == 'diverifikasi' && auth()->user()->role->role_level == 'verifikator_provinsi')
                                    <button class="btn btn-info w-100">Tetapkan Sebagai WBTB</button>
                                    @else
                                    <div class="d-flex justify-content-center mt-4">
                                        <span class="fs-6 text-center text-primary border border-gray rounded-3 w-100">Menunggu Penetapan</span>
                                    </div>
                                    @endif

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                @if (auth()->user()->slug == $wbtb->user->slug && $wbtb->status == 'diajukan')
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    Hapus
                </button>
                @elseif (auth()->user()->role->role_level == 'verifikator_kabkot' && $wbtb->status == 'diajukan')
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    Verifikikasi
                </button>
                @elseif (auth()->user()->role->role_level == 'verifikator_provinsi' && $wbtb->status == 'diverifikasi')
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    Tetapkan sebagai WBTB
                </button>
                @endif


                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Hapus WBTB</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus WBTB {{ $wbtb->nama_wbtb }} ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="{{ route('mobile.wbtb.destroy', $wbtb->id) }}" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleIcons = document.querySelectorAll('.toggle-icon');

        toggleIcons.forEach((icon) => {
            icon.addEventListener('click', function () {
                const target = document.querySelector(this.dataset.bsTarget);

                target.addEventListener('shown.bs.collapse', () => {
                    this.classList.remove('fa-chevron-down');
                    this.classList.add('fa-chevron-up');
                });

                target.addEventListener('hidden.bs.collapse', () => {
                    this.classList.remove('fa-chevron-up');
                    this.classList.add('fa-chevron-down');
                });
            });
        });
    });

</script>
@endpush